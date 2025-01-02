document.addEventListener('DOMContentLoaded', function () {
    const taskForm = document.getElementById('taskForm');
    const taskList = document.getElementById('taskList');
    const tasks = [];

    // Modal elements
    const modal = document.getElementById("taskModal");
    const modalText = document.getElementById("modalText");
    const closeButton = document.querySelector(".close");
    const confirmButton = document.getElementById("confirmButton");
    const snoozeButton = document.getElementById("snoozeButton");
    let currentTask = null;

    taskForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const description = document.getElementById('description').value;
        const time = document.getElementById('time').value;

        if (description && time) {
            const task = { description, time: new Date(time) };
            tasks.push(task);
            addTaskToList(task);
            scheduleTask(task);
            taskForm.reset();
        }
    });

    function addTaskToList(task) {
        const li = document.createElement('li');
        taskText = task.description;
        dateText = task.time.toLocaleString();
        li.textContent = `${taskText} at ${dateText}`;
        li.innerHTML = `
            <span>${taskText} - ${dateText}</span><br />
            <button class="deleteButton">Delete</button>
        `;
        taskList.appendChild(li);

        // Add click event listener to the delete button
        li.querySelector(".deleteButton").addEventListener("click", () => {
            deleteTask(li);
        });
    }

    function scheduleTask(task) {
        const now = new Date();
        const timeToTask = task.time - now;

        if (timeToTask > 0) {
            setTimeout(() => {
                currentTask = task;
                showModal(task.description);
                responsiveVoice.speak(`It's time for your task: ${task.description}`, "UK English Female");
            }, timeToTask);
        }
    }

    function deleteTask(taskElement) {
        taskList.removeChild(taskElement);
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
    const changeInterval = 60000; // Change image every 5 seconds

    function changeImage() {
        currentIndex = (currentIndex + 1) % images.length;
        sliderImage.src = images[currentIndex];
    }

    setInterval(changeImage, changeInterval);
});
