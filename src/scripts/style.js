
window.changeStyle = changeStyle;
window.changeFont = changeFont;
window.mouseOver = mouseOver;
window.mouseLeave= mouseLeave;

var isBright = true;

function changeStyle() {
    isBright = !isBright;
    var bodyClasses = document.querySelector('body').classList
    if(isBright) {
        bodyClasses.remove('dark');
        bodyClasses.add('bright');
    } else {
        bodyClasses.remove('bright');
        bodyClasses.add('dark');
    }
}

function changeFont(selected) {
    document.body.style.fontFamily = selected.value;
}


function mouseOver() {
    var title = getValueOf("title");
    var content = getValueOf("content");
    var noteFormClass= document.getElementsByClassName('noteForm')[0];

    if(!title || !content) {
        noteFormClass.classList.remove('border-green')
        noteFormClass.classList.add('border-red')
    } else {
        noteFormClass.classList.remove('border-red')
        noteFormClass.classList.add('border-green')
    }
}

function mouseLeave() {
    var noteFormClass= document.getElementsByClassName('noteForm')[0];
    noteFormClass.classList.remove('border-red')
    noteFormClass.classList.remove('border-green')
}

function getValueOf(id) {
    return document.getElementById(id).value;
}
