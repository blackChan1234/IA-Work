class ProgressBar {
    clickCount = 0;
    constructor(barId, valueId, maxClicks) {
        this.progressBar = document.getElementById(barId);
        this.progressValue = document.getElementById(valueId);
        this.maxClicks = maxClicks;
        this.updateProgressBar();
    }

    updateProgressBar() {
        if (this.progressBar && this.progressValue) { // Check if elements are found
            this.progressBar.style.width = (this.clickCount / this.maxClicks) * 100 + '%';
            this.progressValue.textContent = `${this.clickCount} / ${this.maxClicks}`;
        }
    }

    increaseClickCount() {
        if (this.clickCount < this.maxClicks) {
            this.clickCount++;
            this.updateProgressBar();
        }
    }
    setClickCount(clicks){
        if (clicks <= this.maxClicks) {
            this.clickCount=clicks;
            this.updateProgressBar();
        }
    }
}
updateBar();
/*
 calculateArraySum(data.readTime);

p1= new ProgressBar ("progress-bar2","progress-value2",30)
p1.setClickCount(29)

*/







/*
const progressBar = document.getElementById('progress-bar');
const progressValue = document.getElementById('progress-value');

let clickCount = 0;
const maxClicks = 30;

function updateProgressBar() {
    progressBar.style.width = (clickCount / maxClicks) * 100 + '%';
    progressValue.textContent = `${clickCount} / ${maxClicks}`;
}

updateProgressBar();


*/


