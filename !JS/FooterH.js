var FooterH = document.getElementById("Footer").offsetHeight;
var vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)
document.getElementById("Content").style.minHeight = vh - FooterH + "px";