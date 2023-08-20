function generateButtons() {
  var items = document.querySelectorAll('.index-header');
  var buttonContainer = document.getElementById("button-block");

  for (var i = 0; i < items.length; i++) {
    var button = document.createElement("button");
    button.textContent = items[i].textContent; 
    buttonContainer.appendChild(button);
  }
}

window.onload = function() {
    generateButtons();
};