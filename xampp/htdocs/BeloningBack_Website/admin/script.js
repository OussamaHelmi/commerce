// Function to toggle dark mode
function toggleDarkMode() {
    const isDarkMode = document.body.classList.toggle('dark');
    localStorage.setItem('dark-mode', isDarkMode ? 'enabled' : 'disabled');
}


function loadDarkMode() {
    const darkModeState = localStorage.getItem('dark-mode');
    if (darkModeState === 'enabled') {
        document.body.classList.add('dark');
    }
}


document.addEventListener('DOMContentLoaded', (event) => {
    loadDarkMode();

    const modeToggle = document.querySelector('.mode-toggle');
    if (modeToggle) {
        modeToggle.addEventListener('click', toggleDarkMode);
    }
});
