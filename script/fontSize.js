function changeFontSize(child){
    switch(child){
        case 1:
            document.body.style.fontSize = "10px";
            var elements = document.getElementsByClassName('read-more-btn');
            for (var i = 0; i < elements.length; i++) {
                elements[i].style.fontSize = "15px";
            }
            break;
        case 2:
            document.body.style.fontSize = "15px";
            var elements = document.getElementsByClassName('read-more-btn');
            for (var i = 0; i < elements.length; i++) {
                elements[i].style.fontSize = "15px";
            }
            break;
        case 3:
            document.body.style.fontSize = "20px";
            var elements = document.getElementsByClassName('read-more-btn');
            for (var i = 0; i < elements.length; i++) {
                elements[i].style.fontSize = "15px";
            }
            break;
        default:
            break;
    } 
}

let buttons = document.querySelector('.change-fontsize');
let btn = buttons.querySelectorAll('.fontSizebtn');
for (var i = 0; i < btn.length; i++){
    btn[i].addEventListener('click', function(){
        let current = document.getElementsByClassName('active');
        current[0].className = current[0].className.replace('active', '');
        this.className += ' active';
    })
}