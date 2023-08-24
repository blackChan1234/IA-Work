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

// function checkWidth() {
//     if (window.innerWidth < 990) {
//         var h1Element = document.querySelector(".index-column-right h1");
//         h1Element.classList.add("index-header");
//         h1Element.setAttribute("name", "title");
//     }else if (window.innerWidth > 990){
//         var h1Element = document.querySelector(".index-column-right h1");
//         h1Element.classList.remove("index-header");
//         h1Element.removeAttribute("name");            
//     }
// }

function smoothScrollTo(target) {
    window.scrollTo({
        top: target.offsetTop,
        behavior: "smooth"
    });
}
  
function generateButtons() {
    var items = document.querySelectorAll('.index-header');
    var buttonContainer = document.getElementById("button-block");
  
    for (var i = 0; i < items.length; i++) {
      var button = document.createElement("button");
      button.textContent = items[i].textContent; 
      buttonContainer.appendChild(button);
  
      button.addEventListener("click", createScrollToHandler(items[i]));
    }
}
  
function createScrollToHandler(target) {
    return function() {
        smoothScrollTo(target);
    };
}
  
window.onload = function() {
    // checkWidth();
    generateButtons();
};

// window.addEventListener('resize', checkWidth);
window.addEventListener('resize', generateButtons);
// window.addEventListener('load', checkWidth);
window.addEventListener('load', generateButtons);
