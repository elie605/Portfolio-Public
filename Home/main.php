<?php
    //TODO make a alert if CMScontent missing cuz of adm or no translation

    /** @var $Conn Home not empty initialized in defaultOpen.php at least its should be  */
    $clHome = new Home($CLDatabase);

    $TitleWieBenIk = $clHome->getTitleWieBenIk();
    $ArticelWieBenIk = $clHome->getArticelWieBenIk();
    $TitleTalen = $clHome->getTitleTalen();
    $ArticleTalen = $clHome->getArticleTalen();
    $Talen = $clHome->getLangArray();
    
    echo "
<div id='Home'  class='container-fluid'>";
if($clHome->checkModule($TitleWieBenIk) && $clHome->checkModule($ArticelWieBenIk)){
echo "
         <article>
        <div class='row Row_Title e1_Title' >
            <div class='col-xl-1'>

            </div>
            <div class='col-xl-1'>

            </div>
            <div class='col-xl-7'>
                <h2>
                    <i>              
                        $TitleWieBenIk
                    </i>
                </h2>
            </div>
            <div class='col-xl-3'>

            </div>
        </div>
        <div class='row'>
            <div class='col-xl-1'>

            </div>
            <div class='col-xl-1'>

            </div>
            <div class='col-xl-5'>
       
                    <p>
                        $ArticelWieBenIk
                    </p>

            </div>
            <div class='col-xl-5'>

            </div>
        </div>
                        </article>
       ";
}

if($clHome->checkModule($TitleTalen) && $clHome->checkModule($Talen)){
    echo "
<article>
        <div class='row mt-5'>
            <div class='col-xl-2'>

            </div>
            <div class='col-xl-10'>
                <h3 class='Row_Title'><i>$TitleTalen</i></h3>
            </div>
        </div>
        <div class='row '>
            <div class='col-xl-1'>

            </div>
            <div class='col-xl-11'>";
    $clHome->getLangHTML($Talen);

}
        echo "</article>               
        </div>
    </div>
</div>";


