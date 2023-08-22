function changeFontSize(child){
    switch(child){
        case 1:
            document.body.style.fontSize = "10px";
            changeFontSizeBtnColor(0);
            break;
        case 2:
            document.body.style.fontSize = "15px";
            changeFontSizeBtnColor(1);
            break;
        case 3:
            document.body.style.fontSize = "20px";
            changeFontSizeBtnColor(2);
            break;
        default:
            break;
    } 
}

function changeFontSizeBtnColor(index){
    // Remove all elements with class 'vivid'
    let elements = document.querySelectorAll('.vivid');
    elements.forEach(function(element) {
        element.classList.remove('vivid');
    });

    // Add 'vivid' class to the button at the specified index
    let buttons = document.querySelectorAll('.change-fontsize');
    buttons.forEach(function(button) {
        let fontSizeBtns = button.querySelectorAll('.fontSizebtn');
        fontSizeBtns[index].classList.add('vivid');
    });
}