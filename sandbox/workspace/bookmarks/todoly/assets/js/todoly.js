document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('taskForm');
    const taskList = document.getElementById('taskList');
    const beep = new Audio('assets/sounds/beep.mp3'); 
    let tasks = JSON.parse(localStorage.getItem('tasks'));
    if (!Array.isArray(tasks)) {
        tasks = [];
    }
    let currentTask = null;

    let startTime, endTime = null;
    enterKeyPressed();

    // Load existing tasks
    tasks.forEach(addTaskToList);

    taskForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const description = document.getElementById('description').value.trim();
        const time = new Date(document.getElementById('time').value);
    
        if (!description || isNaN(time)) return;
    
        const task = { 
            description, 
            time: time.toISOString(),
            confirmed: false // Initially not confirmed
        };
        tasks.push(task);
        localStorage.setItem('tasks', JSON.stringify(tasks));
        addTaskToList(task);
        scheduleTask(task);
        taskForm.reset();
    });

    function enterKeyPressed() {
        document.getElementById("description").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.querySelector("#taskForm button").click();
            }
        });
    }
    
    function formatDate(isoString) {
        const date = new Date(isoString);
        return date.toLocaleString(); // Format date in local format
    }

    function calculateDuration(startTime, endTime) {
        if (!startTime || !endTime) return "0s"; // Ensure valid dates
    
        let diff = Math.floor((endTime - startTime) / 1000); // Difference in seconds
        if (diff <= 0) return "0s"; // Prevent negative durations
    
        let result = "";
    
        const years = Math.floor(diff / (365 * 24 * 60 * 60));
        diff %= (365 * 24 * 60 * 60);
        const months = Math.floor(diff / (30 * 24 * 60 * 60));
        diff %= (30 * 24 * 60 * 60);
        const weeks = Math.floor(diff / (7 * 24 * 60 * 60));
        diff %= (7 * 24 * 60 * 60);
        const days = Math.floor(diff / (24 * 60 * 60));
        diff %= (24 * 60 * 60);
        const hours = Math.floor(diff / (60 * 60));
        diff %= (60 * 60);
        const minutes = Math.floor(diff / 60);
        const seconds = diff % 60;
    
        if (years > 0) result += `${years} year${years > 1 ? "s" : ""} `;
        if (months > 0) result += `${months} month${months > 1 ? "s" : ""} `;
        if (weeks > 0) result += `${weeks} week${weeks > 1 ? "s" : ""} `;
        if (days > 0) result += `${days} day${days > 1 ? "s" : ""} `;
        if (hours > 0) result += `${hours}h `;
        if (minutes > 0) result += `${minutes}m `;
        if (seconds > 0) result += `${seconds}s`;
    
        return result.trim() || "0s"; // Ensure output is never empty
    }
    
    
    function updateTaskDuration(taskElement, task) {
        const doneTask = taskElement.querySelector('.doneText');
        if (doneTask) {
            const startTime = new Date(task.time);
            const endTime = new Date(task.completedAt);
            doneTask.innerHTML = 'Took ' + calculateDuration(startTime, endTime);
            doneTask.style.visibility = "visible";
        }
    }

    function addTaskToList(task) {
        const li = document.createElement('li');
        const taskText = task.description;
        const dateText = formatDate(task.time);
        
        li.innerHTML = `
            <span class="dateText">${dateText}</span> </span><br />
            <span class="taskText">${taskText}</span><br />
            <button class="btn btn-danger deleteButton">Delete</button>
            ${!task.confirmed ? '<button class="btn btn-warning snoozeButton">Snooze</button>' : ''}
            ${!task.confirmed ? '<button class="btn btn-success confirmButton">Confirm</button>' : ''}
            <div class="done"><span class="doneText" style="${task.confirmed ? 'visibility:visible' : 'visibility:hidden'};">${task.confirmed ? 'Took ' + calculateDuration(task.time, task.completedAt) : 'Took ' + calculateDuration(task.time, task.completedAt)}</span></div>
        `;
        console.log(task);
        taskList.appendChild(li);

        // Attach event listeners
        li.querySelector(".deleteButton").addEventListener("click", () => deleteTask(li, task));
        if (!task.confirmed) {
            li.querySelector(".confirmButton").addEventListener("click", () => confirmTask(li, task));
            li.querySelector(".snoozeButton").addEventListener("click", () => snoozeTask(li, task));
        } else {
            updateTaskDuration(li, task); // Ensure duration is shown on page load
        }
    }

    function scheduleTask(task) {
        const now = new Date();
        const timeToTask = new Date(task.time) - now;
        let description = ``
        if (timeToTask > 0) {
            setTimeout(() => {
                beep.play();
            }, timeToTask - 2000); 
    
            setTimeout(() => {
                currentTask = task;
                description = `It's time for your task: ${task.description}`, "UK English Female"
                responsiveVoice.speak(description);
            }, timeToTask);
        }
    }

    function deleteTask(taskElement, task) {
        taskList.removeChild(taskElement);
        tasks = tasks.filter(t => t.description !== task.description || t.time !== task.time);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }

    function confirmTask(taskElement, task) {
        if (!taskElement) return; // Ensure taskElement exists
    
        const startTime = new Date(task.time);
        const timeTaskDone = new Date();
        const doneText = taskElement.querySelector('.doneText'); 
        const confirmButton = taskElement.querySelector('.confirmButton'); // Find the confirm button
        const snoozeButton = taskElement.querySelector('.snoozeButton');
    
        // Update task properties
        task.completedAt = timeTaskDone.toISOString(); // Store completion time
        task.confirmed = true;
    
        // Find and update the task in the array
        const taskIndex = tasks.findIndex(t => t.description === task.description && t.time === task.time);
        if (taskIndex !== -1) {
            tasks[taskIndex] = task; // Update the task in the array
        }
    
        // Update localStorage with modified tasks array
        localStorage.setItem('tasks', JSON.stringify(tasks));
    
        if (doneText) {
            updateTaskDuration(taskElement, task);
        }
    
        if (confirmButton) {
            confirmButton.remove(); 
            snoozeButton.remove(); 
        }

        responsiveVoice.speak(`Task "${task.description}" confirmed as done.`, "UK English Female");
    }
    

    function snoozeTask(taskElement, task) {
        responsiveVoice.speak(`Task "${task.description}" snoozed for 5 minutes.`, "UK English Female");
        setTimeout(() => {
            beep.play();
            responsiveVoice.speak(`Reminder: It's time for your task: ${task.description}`, "UK English Female");
        }, 5 * 60 * 1000); // 5-minute snooze
    }

    function formatDate(isoString) {
        const date = new Date(isoString);
        const yyyy = date.getFullYear();
        const mm = String(date.getMonth() + 1).padStart(2, '0');
        const dd = String(date.getDate()).padStart(2, '0');
        const hh = String(date.getHours()).padStart(2, '0');
        const mi = String(date.getMinutes()).padStart(2, '0');
        const ss = String(date.getSeconds()).padStart(2, '0');
        
        return `${yyyy}-${mm}-${dd} ${hh}:${mi}:${ss}`;
    }

    const images = [
        'assets/images/13882329_xl.jpg',
        'assets/images/15702210_xl.jpg',
        'assets/images/20708828_xl.jpg',
        'assets/images/24562916_xl.jpg',
        'assets/images/32472819_xl.jpg',
        'assets/images/35514164_xl.jpg',
        'assets/images/38044388_xl.jpg',
        'assets/images/38410531_xl.jpg',
        'assets/images/39460720_xl.jpg',
        'assets/images/40110057_xl.jpg',
        'assets/images/40583353_xl.jpg',
        'assets/images/40979868_xl.jpg',
        'assets/images/41176656_xl.jpg',
        'assets/images/41319845_xl.jpg',
        'assets/images/45066053_xl.jpg',
        'assets/images/47188652_xl.jpg',
        'assets/images/47936012_xl.jpg',
        'assets/images/48545960_xl.jpg',
        'assets/images/48672457_xl.jpg',
        'assets/images/53402047_xl.jpg',
    ];

    let currentIndex = 0;
    const sliderImage = document.getElementById('sliderImage');
    const changeInterval = 60000; 

    function changeImage() {
        currentIndex = (currentIndex + 1) % images.length;
        sliderImage.src = images[currentIndex];
    }

    if (sliderImage) {
        setInterval(changeImage, changeInterval);
    }
});
