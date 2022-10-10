<body>

<nav id="Nav" class="container-fluid ">
    <div class="row align-items-center h-100 m-0">
        <div class="col-xl-1">

        </div>
        <div class="col-xl-1 container">

        </div>

        <div class="col-xl-7">
            <ul class="navbar-nav ">
                <?php
                //Load in nav
                $CLNav->getNav();
                ?>
            </ul>
        </div>
        <div class="col-xl-2 " id="options">
            <ul>
                <li>
                    <div id="DayNight">
                        <label class="switch ">
                            <input type="checkbox" id="DayNightButton" onclick="lightUp()" style=" outline: none;">
                            <span id="DayNightButtonAnim" class="slider round">
                    <span class="w-100">
                            <i class="fas fa-sun fa-sm float-left"></i>
                            <i class="fa fa-moon fa-sm float-right"></i>
                    </span>
                </span>
                        </label>
                    </div>
                </li>
                <li>
                    <div id="lang_sel" class="dropdown">
                        <button type="button" onclick="dropdown('lang_sel_Dropdown')" class="dropbtn">
                            <i class="fas fa-globe-europe "></i>
                        </button>
                        <div id="lang_sel_Dropdown" class="dropdown-content">
                            <a href="?lang=nl">NL</a>
                            <a href="?lang=en">EN</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-xl-1 ">

        </div>
</nav>
<div id="Content">
<?php
//if alert set show alert and reset to null
if(isset($_SESSION['Alert'] )){
    echo $_SESSION['Alert'];
    $_SESSION['Alert'] = Null;
}
?>