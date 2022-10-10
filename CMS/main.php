<?php



?>
<div id="CMS" class="container-fluid">
    <div class="row" id="cmsNav">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <ul class="navbar-nav ">
                <li class='nav-item '>
                    <a class='nav-link Link' href='?p=cont'>
                        Content
                    </a>
                </li>
                <li class='nav-item '>
                    <a class='nav-link Link' href='?p=tact'>
                        Contact
                    </a>
                </li>
                <li class='nav-item '>
                    <a class='nav-link Link' href='?p=bedr'>
                        Bedrijf
                    </a>
                </li>
                <li class='nav-item '>
                    <a class='nav-link Link' href='?p=ople'>
                        Opleiding
                    </a>
                </li>
                <li class='nav-item '>
                    <a class='nav-link Link' href='?p=proj'>
                        Project
                    </a>
                </li>
                <li class='nav-item '>
                    <a class='nav-link Link' href='?p=werk'>
                        Werkervaring
                    </a>
                </li>
                <li class='nav-item '>
                    <a class='nav-link Link' href='?p=taal'>
                        Talen
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="cmsOv" class="row mt-2">
        <?php
        if (isset($_GET['p'])) {
            switch ($_GET['p']) {
                case "cont":
                    require_once("../CMS/Forms/content.php");
                    break;
                case "werk":
                    require_once("../CMS/Forms/werkervaring.php");
                    break;
                case "taal":
                    require_once("../CMS/Forms/talen.php");
                    break;
                case "tact":
                    require_once("../CMS/Forms/contact.php");
                    break;
                case "bedr":
                    require_once("../CMS/Forms/bedrijf.php");
                    break;
                case "ople":
                    require_once("../CMS/Forms/opleiding.php");
                    break;
                case "proj":
                    require_once("../CMS/Forms/project.php");
                    break;

            }
        }

        ?>
    </div>
</div>