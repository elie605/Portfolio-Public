var checkBox = document.getElementById("DayNightButton");
var checkBox2 = document.getElementById("DayNightButtonAnim");



if (localStorage.getItem('DayNight') == 1)
{
    document.styleSheets[1].disabled = false;
    document.styleSheets[2].disabled = true;

    checkBox2.classList.add('skiptransition');
    checkBox.checked = false;
    setTimeout(function (){ checkBox2.classList.remove('skiptransition');},500);
}else {
    document.styleSheets[1].disabled = true;
    document.styleSheets[2].disabled = false;

    checkBox2.classList.add('skiptransition');
    checkBox.checked = true;
    setTimeout(function (){ checkBox2.classList.remove('skiptransition');},500);

}

function lightUp() {
    if (checkBox.checked === true){
        document.styleSheets[1].disabled = true;
        document.styleSheets[2].disabled = false;

        localStorage.setItem('DayNight',0);

    } else {
        document.styleSheets[1].disabled = false;
        document.styleSheets[2].disabled = true;

        localStorage.setItem('DayNight',1);

    }
}