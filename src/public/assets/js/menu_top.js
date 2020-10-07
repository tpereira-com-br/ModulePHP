document.addEventListener('DOMContentLoaded', (event) => {
    var menubutton = document.querySelector(".menubutton"),
    containermenulink=document.querySelectorAll(".containermenulink");
    if (menubutton) {
        menubutton.onclick=function(){slideToggle(containermenulink,2)}
    }
});

window.addEventListener('resize', (event) => {
    var menubutton = document.querySelector(".menubutton"),
    containermenulink=document.querySelectorAll(".containermenulink");
    for(let i=0;i<containermenulink.length;i++){
        containermenulink[i].removeAttribute("style");
    }
})

function getTransition(target, transition) {
    target.style.transition = transition;
}

function slideUp(el, duration) {
    for (let  i = 0; i < el.length; i++) {
        var target = el[i];
        getTransition(target, "all 2s");
        setTimeout(() => {
            target.style.height = "0px";
            target.style.opacity = "0";
        }, 1);
    }
}

function slideDown(el, duration) {
    for (let i = 0; i < el.length; i++) {
        var target = el[i];
        getTransition(target, "all 2s");
        target.style.height = "auto";
        height = target.clientHeight + "px";
        target.style.height = "0px";
        setTimeout(() => {
            target.style.height = height;
            target.style.opacity = "1";
        }, 1);
    }
}

function slideToggle(target, duration) {
    for (let i = 0; i < target.length; i++) {
        var el = [target[i]];
        if (target[i].clientHeight > "0") {
            slideUp(el, duration);
        } else {
            slideDown(el, duration);
        }
    }
}