<!doctype html>
<html lang="en">
<head>
<?php

require("!Class/Index.php");
require("!Class/Database.php");
require("!Class/Nav.php");
require("!Class/Admit.php");

$CLDatabase = new Database($Host = "Something", $DBname = "Something", $UserName = "Something",
    $Password = "Something");
$CLIndex = new Index();
$CLNav = new nav($CLIndex, $Page = isset($_SESSION['Page']) ? $_SESSION['Page'] : "");
$CLAdmit = new Admit($CLDatabase);

/**SET lang from url **/
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $acceptLang = ['nl', 'en'];
    $lang = in_array($lang, $acceptLang) ? $lang : 'nl';
    $_SESSION['lang'] = $lang;
}

/**SET admit with code from url**/
if(isset($_GET['admit'])){
    $CLAdmit->setAdmit($_GET['admit']);
}

?>