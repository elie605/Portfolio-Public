<?php

$CLProject = new Project($CLDatabase);



?>
<div id='project' class='container-fluid '>

    <div id="pList" class="row flex-nowrap px-3 mt-3">
        <?php

        foreach ($CLProject->getProjects() as $o){
            echo "


        <div class='col-xl-2 mx-4 p-0'>
<div class='card'>
<a  class='card-clickable' href='?p=$o->id'>
  <div class='card-body'>
    <h5 class='card-title'>$o->title</h5>
    <p class='card-text'>$o->desc_short</p>
  </div>
     
  <ul class='list-group list-group-flush'>
  ";
            $Tcount = 0;
            foreach ($CLProject->getTalen($o->id) as $ot){
                if($Tcount < 3){
                    echo "<li class='list-group-item'>$ot->title</li>";
                    $Tcount++;
                }
            }
            echo "
  </ul>
 </a>
  <div class='card-footer'>
    <a  target='_blank' href='$o->link' class=''>$o->link</a>     
  </div>


</div>
        </div>
      
        
            ";
        }
        
        ?>
    </div>
    <script>
        var pList = document.getElementById("pList");
        var cAm = pList.childElementCount;
        var sAm = document.getElementById("project").offsetWidth - pList.offsetWidth / cAm;


        function scLeft() {
            console.log(sAm);
            console.log(document.getElementById("project").offsetWidth);

            pList.scroll({left: pList.scrollLeft - sAm, behavior: 'smooth'})
        }

        function scRight() {
            pList.scroll({left: pList.scrollLeft + sAm, behavior: 'smooth'});

        }


    </script>

    <span onclick="scLeft()" style="left: 10%; position: absolute  "><i
                class="fas fa-3x fa-angle-double-left"></i></span>
    <span onclick="scRight()" style="right: 10%;  position: absolute   "><i class="fas fa-3x fa-angle-double-right"></i></span>
<?php
if(isset($_GET['p']) && $CLProject->setInfo($_GET['p'])){

    $title =    $CLProject->getTitle();
    $desc =    $CLProject->getDesc();
    $myexp =    $CLProject->getMyExp();
    $myroll =    $CLProject->getMyRoll();

    //$CLProject->setBedrijf();





    echo "    <div id='pInfo ' class='row px-3 e1_Title' >
        <div class='col-xl-1'>
        </div>
        <div class='col-xl-6'>
            <div  class='row '>
                <div class='col-xl-3'>
                    <img src='../!IMG/Logo.png' height='128' width='128'>
                </div>
                <div id='pInfoB' class='col-xl-9 d-flex align-items-center justify-CMScontent-center'>
                    <h2>$title</h2>
                </div>

            </div>

            <div class='row mt-5'>
                <div class='col-xl-12 pl-3'>
                    <article>
                        <h3>Beschrijving</h3>
<p>$desc</p>
                    </article>
                    <article>
                        <h3>Mijn rol</h3>
<p>$myroll</p>                    
                 
</article>
                    <article>
                        <h3>Mijn ervaring</h3>
<p>$myexp</p>   
                    </article>
                </div>
            </div>
        </div>
        <div class='col-xl-1'>

        </div>
        <div class='col-xl-3 '>
            <div class='row'>
                <div class='col-xl-12'>
                    <h3>Title bedrijf</h3>
                </div>
                <div class='col-xl-12'>
                    <ul>
                        <li>
                            wordbr[eonfquibfdua
                        </li>
                        <li>
                            wordbr[eonfquibfdua
                        </li>
                        <li>
                            wordbr[eonfquibfdua
                        </li>
                    </ul>
                </div>
                <div class='col-xl-12'>
                    <article>
                        <h4>beschrijving</h4>
                        <p>Project Info beschrijv 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'</p>
                    </article>

                    <article>
                        <h4>Mijn ervaring</h4>
                        <p>Project Info beschrijv 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'</p>
                    </article>

                    <article>
                        <h4>Mijn roll</h4>
                        <p>Project Info beschrijv 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'</p>
                    </article>
                </div>
            </div>
        </div>
    </div>";
}

?>
</div>