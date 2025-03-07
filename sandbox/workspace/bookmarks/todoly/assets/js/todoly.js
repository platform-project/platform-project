document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('taskForm');
    const taskList = document.getElementById('taskList');
    let tasks = JSON.parse(localStorage.getItem('tasks')) || [];

    // Modal elements
    const modal = document.getElementById("taskModal");
    const modalText = document.getElementById("modalText");
    const closeButton = document.querySelector(".close");
    const confirmButton = document.getElementById("confirmButton");
    const snoozeButton = document.getElementById("snoozeButton");
    let currentTask = null;

    enterKeyPressed();

    // Load existing tasks
    tasks.forEach(addTaskToList);

    taskForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const description = document.getElementById('description').value.trim();
        const time = new Date(document.getElementById('time').value);
    
        if (!description || isNaN(time)) return;
    
        // Prevent duplicate tasks
        if (tasks.some(task => task.description === description && task.time.getTime() === time.getTime())) {
            showModal("This task already exists!")
            return;
        }
    
        const task = { description, time: time.toISOString() };
        tasks.push(task);
        localStorage.setItem('tasks', JSON.stringify(tasks));
        addTaskToList(task);
        scheduleTask(task);
        taskForm.reset();
    });

    function enterKeyPressed()
    {
        document.getElementById("description").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.querySelector("#taskForm button").click();
            }
        });
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

    function addTaskToList(task) {
        const li = document.createElement('li');
        taskText = task.description;
        dateText = formatDate(task.time)
        li.textContent = `${taskText} at ${dateText}`;
        li.innerHTML = `
            <span style="position: relative; top: -20px; display: block; float: right; padding: 8px; font-size: 10px; border-radius: 10px; font-weight: bolder; color: #f5f5f5; background: #111">${dateText}</span> </span><br />
            <span style="position: relative; top: -10px;">${taskText}</span><br />
            <button style="position: relative; top: -2px;" type="button" class="btn btn-danger deleteButton">Delete</button>
        `;
        taskList.appendChild(li);

        // Add click event listener to the delete button
        li.querySelector(".deleteButton").addEventListener("click", () => {
            deleteTask(li, task);
        });
    }

    function scheduleTask(task) {
        const now = new Date();
        const timeToTask = task.time - now;
    
        if (timeToTask > 0) {
            setTimeout(() => {
                const beep = new Audio('assets/sounds/beep.mp3'); // Ensure this file exists
                beep.play();
            }, timeToTask - 2000); // 2 seconds before modal opens
    
            setTimeout(() => {
                currentTask = task;
                showModal(task.description);
                responsiveVoice.speak(`It's time for your task: ${task.description}`, "UK English Female");
            }, timeToTask);
        }
    }

    function deleteTask(taskElement, task) {
        taskList.removeChild(taskElement);
        
        // Remove task from the array
        const index = tasks.indexOf(task);

        // Remove task from the array and update localStorage
        tasks = tasks.filter(t => t.description !== task.description || t.time !== task.time);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }

    function showModal(taskDescription) {
        modal.style.display = "block";
        modalText.textContent = `It's time for your task: ${taskDescription}`;
    }

    function closeModal() {
        modal.style.display = "none";
    }

    closeButton.onclick = function () {
        closeModal();
    }

    confirmButton.onclick = function () {
        responsiveVoice.speak(`Task "${currentTask.description}" confirmed as done.`, "UK English Female");
        closeModal();
    }

    snoozeButton.onclick = function () {
        responsiveVoice.speak(`Task "${currentTask.description}" snoozed for 5 minutes.`, "UK English Female");
        closeModal();
        setTimeout(() => {
            showModal(currentTask.description);
            responsiveVoice.speak(`Reminder: It's time for your task: ${currentTask.description}`, "UK English Female");
        }, 5 * 60 * 1000); // Snooze for 5 minutes
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            closeModal();
        }
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
        // Add more image paths here
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
