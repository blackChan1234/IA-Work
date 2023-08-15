const sliderMain = document.querySelector('.sliderMain');
const items = document.querySelectorAll('.item');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
const sliderIndex = document.querySelector('.sliderIndex');

let currentIndex = 0;
let isDragging = false;
let startPosX = 0;
let currentTranslate = 0;

function updateIndexIndicator() {
    const indexIndicators = document.querySelectorAll('.sliderIndex .index');
    indexIndicators.forEach((indicator, index) => {
        if (index === currentIndex) {
            indicator.classList.add('currentIndex');
        } else {
            indicator.classList.remove('currentIndex');
        }
    });
}

function slideTo(index) {
    currentIndex = index;
    const offset = currentIndex * -100;
    currentTranslate = offset;
    sliderMain.style.transition = 'left 0.5s ease-in-out';
    sliderMain.style.left = currentTranslate + '%';
    updateIndexIndicator();
}

function loopSlide(direction) {
    if (direction === 'next') {
        currentIndex = (currentIndex + 1) % items.length;
    } else if (direction === 'prev') {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
    }
    slideTo(currentIndex);
}

prevBtn.addEventListener('click', () => {
    loopSlide('prev');
    resetAutoLoopInterval();
});

nextBtn.addEventListener('click', () => {
    loopSlide('next');
    resetAutoLoopInterval();
});

// Rest of your touch event code

// Initialize index indicators and set initial positions
for (let i = 0; i < items.length; i++) {
    const indexIndicator = document.createElement('div');
    indexIndicator.classList.add('index');
    indexIndicator.addEventListener('click', () => slideTo(i));
    sliderIndex.appendChild(indexIndicator);
    
    // Set initial position of each item
    items[i].style.left = i * 100 + '%';
}
updateIndexIndicator();

// Auto loop through images
let autoLoopInterval = startAutoLoopInterval();

function startAutoLoopInterval() {
    return setInterval(() => {
        loopSlide('next');
    }, 3000); // Change the interval duration as needed
}

function resetAutoLoopInterval() {
    clearInterval(autoLoopInterval);
    autoLoopInterval = startAutoLoopInterval();
}

sliderMain.addEventListener('touchstart', () => {
    clearInterval(autoLoopInterval);
});

sliderMain.addEventListener('touchend', () => {
    resetAutoLoopInterval();
});