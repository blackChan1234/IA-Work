document.addEventListener("DOMContentLoaded", () => {
    const sliderMain = document.getElementById('sliderMain');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    const sliderIndex = document.getElementById('sliderIndex');

    const images = [
        "img/examplePic/image1.png",
        "img/examplePic/image2.png",
        "img/examplePic/image3.png",
        "img/examplePic/image4.png",
        "img/examplePic/image5.png",
        "img/examplePic/image6.png"
    ];

    let currentIndex = 0;
    
    function createImageElement(src, alt) {
        const img = document.createElement('img');
        img.src = src;
        img.alt = alt;
        return img;
    }

    function updateIndexIndicator() {
        const indexIndicators = sliderIndex.querySelectorAll('.index');
        indexIndicators.forEach((indicator, index) => {
            indicator.classList.toggle('currentIndex', index === currentIndex);
        });
    }

    function slideTo(index) {
        currentIndex = (index + images.length) % images.length;
        sliderMain.style.transform = `translateX(${-currentIndex * 100}%)`;
        updateIndexIndicator();
    }

    prevBtn.addEventListener('click', () => {
        slideTo(currentIndex - 1);
    });

    nextBtn.addEventListener('click', () => {
        slideTo(currentIndex + 1);
    });

    images.forEach((imageSrc, index) => {
        const imageElement = createImageElement(imageSrc, `Image ${index + 1}`);
        const item = document.createElement('div');
        item.className = 'item';
        const link = document.createElement('a');
        link.href = '#';
        link.appendChild(imageElement);
        item.appendChild(link);
        sliderMain.appendChild(item);

        const indexIndicator = document.createElement('div');
        indexIndicator.className = 'index';
        indexIndicator.addEventListener('click', () => slideTo(index));
        sliderIndex.appendChild(indexIndicator);
    });

    updateIndexIndicator();

    let autoLoopInterval = startAutoLoopInterval();

    function startAutoLoopInterval() {
        return setInterval(() => {
            slideTo(currentIndex + 1);
        }, 3000);
    }

    function resetAutoLoopInterval() {
        clearInterval(autoLoopInterval);
        autoLoopInterval = startAutoLoopInterval();
    }

    sliderMain.addEventListener('mouseenter', resetAutoLoopInterval);
    sliderMain.addEventListener('mouseleave', resetAutoLoopInterval);
});