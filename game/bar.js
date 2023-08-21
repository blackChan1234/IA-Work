const progressBar = document.getElementById('progress-bar');
const progressValue = document.getElementById('progress-value');

let clickCount = 0;
const maxClicks = 30;

function updateProgressBar() {
    progressBar.style.width = (clickCount / maxClicks) * 100 + '%';
    progressValue.textContent = `${clickCount} / ${maxClicks}`;
}

updateProgressBar();
