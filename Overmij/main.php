<?php
//TODO make a alert if CMScontent missing cuz of adm or no translation

/** @var $Conn Home not empty initialized in defaultOpen.php at least its should be */
$clOvermij = new Overmij($CLDatabase);

$titleWieBenIk = $clOvermij->getTitleWieBenIk();
$articleWieBenIk = $clOvermij->getArticleWieBenIk();
$titleHobby = $clOvermij->getTitleHobby();
$articleHobby = $clOvermij->getArticleHobby();
$titleOpleidingen = $clOvermij->getTitleOpleidingen();
$titleContactGe = $clOvermij->getTitleContactGe();
$titleWerkervaring = $clOvermij->getTitleWerkervaring();
$titleTalen = $clOvermij->getTitleTalen();
$arrTalen = $clOvermij->getLangArray();

echo "
<div id='Overmij' class='container-fluid'>";
if ($clOvermij->checkModule($titleWieBenIk) && $clOvermij->checkModule($articleWieBenIk)) {
    echo "
<article>
        <div class='row Row_Title e1_Title' >
            <div class='col-xl-2'>

            </div>
            <div class='col-xl-7'>
            
                <h2>
                    <i>
                        $titleWieBenIk
                    </i>
                </h2>
            </div>
            <div class='col-xl-3'>

            </div>
        </div>
        <div class='row'>
            <div class='col-xl-2'>

            </div>
            <div class='col-xl-4'>
                
                    <p>
                    $articleWieBenIk
                    </p>
             
            </div>
            <div class='col-xl-1'>

            </div>
            <div class='col-xl-2 p-5'>
                <img class='card-img-bottom rounded-circle' src='../!IMG/PF.jpg' alt='Card image'>
            </div>
        </div>
</article>
        ";
}

if ($clOvermij->checkModule($titleHobby) && $clOvermij->checkModule($articleHobby)) {
    echo "
<article>
        <div class='row Row_Title e1_Title'>
            <div class='col-xl-2'>

            </div>
            <div class='col-xl-4'>
            <article>
                <div class='row'>
                    <div class='col-xl-12'>
                        <h2>
                            <i>
                                $titleHobby
                            </i>
                        </h2>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xl-12'>
                        
                            $articleHobby
                    </div>
                </div>
                </div>
                
</article>                ";
}

if ($clOvermij->checkModule($titleContactGe) && $clOvermij->checkModule($clOvermij->getArrayContactInfo())) {
    echo "


            <div class='col-xl-1'>

            </div>
            <div class='col-xl-4 pl-5'>
                   <article>
                <div class='row'>

                    <div class='col-xl-7'>
                        <h2>
                            <i>
                                $titleContactGe
                            </i>
                        </h2>
                    </div>
                </div>
                <div class='row'>
                            <div class='col-xl-2'>

            </div>
                    <div class='col-xl-7'>                  
                        <ul>
                                                ";
    foreach ($clOvermij->getArrayContactInfo() as $opl) {
        echo "              <li>$opl->title $opl->info</li>
                         ";
    }
    echo "

                        </ul>
                    </div>
                </div>
                </article>
            </div>

        </div>


";
}


if ($clOvermij->checkModule($titleOpleidingen) && $clOvermij->checkModule($titleOpleidingen)) {
    echo "<article>
                <div class='row Row_Title mt-5' >
                            <div class='col-xl-2'>

            </div>
                    <div class='col-xl-7'>
                        <h2>
                            <i>
                                $titleOpleidingen
                            </i>
                        </h2>
                    </div>
                </div>
                <div class='row'>
                            <div class='col-xl-2'>

            </div>
                    <div class='col-xl-7'>
                        
                        <dl>
                        ";
    foreach ($clOvermij->getOpleiArray() as $opl) {
        echo "              <dt>$opl->title</dt><dd>$opl->desc</dd>
                         ";
    }
    echo "
                      

                        </ul>
                        
                    </div>
                </div>
              </article>  
                 ";
}
if ($clOvermij->checkModule($titleWerkervaring) && $clOvermij->checkModule($titleOpleidingen)) {
    echo "
                <article>  
                <div class='row Row_Title mt-5' >
                            <div class='col-xl-2'>

            </div>
                    <div class='col-xl-7'>
                        <h2>
                            <i>
                                $titleWerkervaring
                            </i>
                        </h2>
                    </div>
                </div>
                <div class='row'>
                            <div class='col-xl-2'>

            </div>
                    <div class='col-xl-7'>                             <dl>
                        ";
    foreach ($clOvermij->getWerkEArray() as $opl) {
        echo "              <dt>$opl->title</dt><dd>$opl->desc<dd/>
                         ";
    }
    echo "
                        </dl>
                        
                    </div>
                </div>
            
            
</article>
";
}
if ($clOvermij->checkModule($titleTalen) && $clOvermij->checkModule($arrTalen)) {
    echo "
<article>
        <div class='row mt-5'>
            <div class='col-xl-2'>

            </div>
            <div class='col-xl-10'>
                <h3 class='Row_Title'><i>$titleTalen</i></h3>
            </div>
        </div>
        <div class='row '>
            <div class='col-xl-1'>

            </div>
            <div class='col-xl-11'>";
    $clOvermij->getLangHTML($arrTalen);

}
echo "            </article>
            </div>
        </div>
    </div>
</div>";
?>