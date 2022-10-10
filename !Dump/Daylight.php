<script>
    if (!localStorage.getItem("visited")) {
        f();
        localStorage.setItem("visited", true);
    }

    function f() {
        setTimeout(checkScheme, 100);
    }

    function checkScheme() {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.styleSheets[1].disabled = false;
            document.styleSheets[2].disabled = true;
            checkBox.checked = false;
            localStorage.setItem('DayNight', 1)
        }
    }

    var checkBox = document.getElementById("DayNightButton");
    var checkBox2 = document.getElementById("DayNightButtonAnim");


    if (localStorage.getItem('DayNight') == 1) {
        document.styleSheets[1].disabled = false;
        document.styleSheets[2].disabled = true;

        checkBox2.classList.add('skiptransition');
        checkBox.checked = false;
        setTimeout(function () {
            checkBox2.classList.remove('skiptransition');
        }, 500);
    } else {
        document.styleSheets[1].disabled = true;
        document.styleSheets[2].disabled = false;

        checkBox2.classList.add('skiptransition');
        checkBox.checked = true;
        setTimeout(function () {
            checkBox2.classList.remove('skiptransition');
        }, 500);

    }

    function lightUp() {
        if (checkBox.checked === true) {
            document.styleSheets[1].disabled = true;
            document.styleSheets[2].disabled = false;

            localStorage.setItem('DayNight', 0);

        } else {
            document.styleSheets[1].disabled = false;
            document.styleSheets[2].disabled = true;

            localStorage.setItem('DayNight', 1);

        }
    }
</script>

<style>
    .skiptransition::before {
        -webkit-transition: .0s !important;
        transition: .0s !important;
    }

    .skiptransition {
        -webkit-transition: .0s !important;
        transition: .0s !important;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 62px;
        height: 30px;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        -webkit-transition: .4s;
        transition: .4s;
        background-color: #434847;
        border: solid 1px dimgrey;

    }

    #DayNight .slider::before {
        position: absolute;
        content: "";
        height: 24px;
        width: 24px;
        left: 4px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    #DayNight input:checked + .slider {
        background-color: #35D48F;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(30px);
        -ms-transform: translateX(30px);
        transform: translateX(30px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<div id="DayNight">
    <label class="switch ">
        <input type="checkbox" id="DayNightButton" onclick="lightUp()" style=" outline: none;">
        <span id="DayNightButtonAnim" class="slider round">
            <span class="w-100">
                <i class="fas fa-sun fa-sm float-left"></i>
                <i class="fa fa-moon fa-sm float-right"></i>
            </span>
        /span>
    </label>
</div>