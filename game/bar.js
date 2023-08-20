const resizableBar = document.getElementById('resizable-bar');
const barSlider = document.getElementById('bar-slider');

barSlider.addEventListener('input', () => {
    const sliderValue = barSlider.value;
    resizableBar.style.width = sliderValue + '%';
});