if(!localStorage.getItem("visited")){
    f();
    localStorage.setItem("visited",true);
}

function f() {
   setTimeout(checkScheme, 100);
}

function checkScheme() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.styleSheets[1].disabled = false;
        document.styleSheets[2].disabled = true;
        checkBox.checked = false;
        localStorage.setItem('DayNight',1)
    }
}