function myFunction(ID) {
    var x = document.getElementById(ID);
    if (x.classList.contains("Hidden")) {
        x.classList.remove("Hidden");
    } else {
        x.classList.add("Hidden");
    }
}
