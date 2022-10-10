<?php
session_start();

/**SET Default Values if not set yet**/
/*Something*/
/**SET Default lang Value**/
if (!isset($_SESSION['lang'] )){
    //TODO test if lang_default is set from system
    //TODO handmatig cookie instelling onthouden
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $acceptLang = ['nl', 'en'];
    $lang = in_array($lang, $acceptLang) ? $lang : 'nl';
    $_SESSION['lang']= $lang;
}

/**GET Page info**/
$mDataJson = json_decode(file_get_contents("resources.json"), true);

/*Something*/
/**Lang check***/
if (isset($mDataJson['lang'])){
    if( !in_array($_SESSION['lang'],$mDataJson['lang'])){
        if(sizeof($mDataJson['lang']) >= 1 ){
            $_SESSION['lang'] = $mDataJson['lang'][0];
        }

    }
}
/*Something*/
?>