document.addEventListener("DOMContentLoaded", function () {
    const darkModeToggle = document.getElementById("darkModeToggle");
    const container = document.querySelector('.container');
    const listItems = document.querySelectorAll("#taskList li"); 

    function applyDarkMode() {
        container.classList.add("dark-mode");
        listItems.forEach(item => (item.classList.add("dark-mode")));
        localStorage.setItem("darkMode", "enabled");
        darkModeToggle.innerHTML = `<i class="fas fa-sun"></i> Light Mode`;
        darkModeToggle.style.color = 'black'
        darkModeToggle.style.background = 'white'
        location.reload();
    }

    function removeDarkMode() {
        container.classList.remove("dark-mode");
        listItems.forEach(item => (item.classList.remove("dark-mode")));
        localStorage.setItem("darkMode", "disabled");
        darkModeToggle.innerHTML = `<i class="fas fa-moon"></i> Dark Mode`;
        darkModeToggle.style.color = 'white'
        darkModeToggle.style.background = 'black'
        location.reload();
    }

    function checkTimeForTheme() {
        const hour = new Date().getHours();
        if (hour >= 18 || hour < 6) {
            applyDarkMode();
        } else {
            removeDarkMode();
        }
    }

    // Load stored preference or auto-detect
    const savedTheme = localStorage.getItem("darkMode");
    if (savedTheme === "enabled") {
        applyDarkMode();
    } else if (savedTheme === "disabled") {
        removeDarkMode();
    } else {
        checkTimeForTheme();
    }

    // Manual Theme Toggle
    darkModeToggle.addEventListener("click", () => {
        if (container.classList.contains("dark-mode")) {
            removeDarkMode();
        } else {
            applyDarkMode();
        }
    });

    function checkTimeAndReload() {
        const now = new Date();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();
    
        // Reload every hour
        if (minutes === 0 && seconds === 0) {
            location.reload();  // Reload the page
        }
    }
    
    // Run immediately when the page loads
    checkTimeForTheme();
    checkTimeAndReload();

    // Auto-switch at 06:00 and 18:00
    setInterval(checkTimeForTheme, 60 * 1000); // Check every minute

    // Run checkTimeAndReload every minute
    setInterval(checkTimeAndReload, 60 * 1000); // Check every minute
});
