
function expandNews(event) {
    var newsList = document.querySelector('.news-list');
    var expandLink = document.querySelector('.expand');

    event.preventDefault(); 

    if (newsList.style.height === 'auto') {
        newsList.style.height = '660px';
        expandLink.textContent = '顯示更多';
        newsList.style.display = 'hidden';
    } else {
        newsList.style.height = 'auto';
        expandLink.textContent = '隱藏更多';
        newsList.style.display = null;
    }
}