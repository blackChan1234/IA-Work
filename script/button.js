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
    generateButtons();
};