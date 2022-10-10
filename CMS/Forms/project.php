<?php
$CLProject = new CMSproject($CLDatabase);


if (isset($_GET['id'])) {
    $CLProject->setInfo($_GET['id']);

}
if (isset($_GET['c'])) {
    $CLProject->deleteField($_GET['c']);
}
?>
<div class="col-xl-1">
</div>
<div class="col-xl-3">
    <div class="row">
        <div class="col-xl-12">
            <a href="?p=proj">new</a>
            <h3>Project:</h3>
        </div>
    </div>
    <form method="post">
        <div class="row">
            <div class="col-xl-3">
                <label><b>admit:</b></label>
            </div>
            <div class="col-xl-4">
                <?php
                if (isset($_GET['id'])) {
                    $CLProject->getAdmitOptId();
                } else $CLProject->getAdmitOpt();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>Taal text:</b></label>
            </div>
            <div class="col-xl-4">
                <?php
                if (isset($_GET['id'])) {
                    $CLProject->getTalenOptId(false);
                } else$CLProject->getTalenOpt(false);

                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>Bedrijf:</b></label>
            </div>
            <div class="col-xl-4">
                <?php
                if (isset($_GET['id'])) {
                    $CLProject->getBedrijfOptId(false);
                } else$CLProject->getBedrijfOpt(false);

                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>Programeer talen:</b></label>
            </div>
            <div class="col-xl-4">
                <?php
                if (isset($_GET['id'])) {
                    $CLProject->getProgTaalCheckId(false);
                } else$CLProject->getProgTaalCheck(false);

                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>title:</b></label>
            </div>
            <div class="col-xl-9">
                <input type="text" name="txtTitle" value="<?php
                if (isset($_GET['id'])) {
                    echo $CLProject->getTitle();
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>Link:</b></label>
            </div>
            <div class="col-xl-9">
                <input type="text" name="txtLink" value="<?php
                if (isset($_GET['id'])) {
                    echo $CLProject->getLink();
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>Email:</b></label>
            </div>
            <div class="col-xl-9">
                <input type="email" name="txtEmail" value="<?php
                if (isset($_GET['id'])) {
                    echo $CLProject->getEmail();
                }
                ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>desc:</b></label>
            </div>
            <div class="col-xl-9">
                <textarea name="txtDesc"><?php
                    if (isset($_GET['id'])) {
                        echo $CLProject->getDesc();
                    }
                    ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>desc kort:</b></label>
            </div>
            <div class="col-xl-9">
                <textarea name="txtDescShort"><?php
                    if (isset($_GET['id'])) {
                        echo $CLProject->getDescshort();
                    }
                    ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>Mij roll:</b></label>
            </div>
            <div class="col-xl-9">
                <textarea name="txtMyroll"><?php
                    if (isset($_GET['id'])) {
                        echo $CLProject->getMyroll();
                    }
                    ?></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <label><b>Mij exp:</b></label>
            </div>
            <div class="col-xl-9">
                <textarea name="txtMyexp"><?php
                    if (isset($_GET['id'])) {
                        echo $CLProject->getMyexp();
                    }
                    ?></textarea>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-3">
                <button name="btnSubmit" type="submit" class="btn btn-primary">
                    <?php
                    if (isset($_GET['id'])) {
                        echo "Aanpassen";
                    } else echo "Toevoegen";

                    ?></button>
            </div>
        </div>

    </form>

    <?php
    if (isset($_POST['btnSubmit'])) {
        if ($_POST['admit'] > 3 || $_POST['admit'] < 0) {
            echo "wierdo";
        }
        $i = 0;
        $allLangs = array();
        foreach ($CLProject->getAllProgTalen() as $o){
            if(isset($_POST["ProgTaal$i"])){
                array_push($allLangs, $_POST["ProgTaal$i"]);
            }

            $i++;
        }
        if (isset($_GET['id'])){
            $CLProject->alterInfo($_GET['id'],$_POST['admit'], $_POST['talen'], $_POST['bedrijf'],$_POST['txtTitle'],$_POST['txtLink'],$_POST['txtEmail'],$_POST['txtDesc'],$_POST['txtDescShort'],$_POST['txtMyroll'],$_POST['txtMyexp'],$allLangs);
        }else $CLProject->submitInfo($_POST['admit'], $_POST['talen'], $_POST['bedrijf'],$_POST['txtTitle'],$_POST['txtLink'],$_POST['txtEmail'],$_POST['txtDesc'],$_POST['txtDescShort'],$_POST['txtMyroll'],$_POST['txtMyexp'],$allLangs);
    }


    ?>
</div>
<div class="col-xl-8">
    <table class="infoTable">
        <tr>
            <th>

            </th>

            <th>
                id
            </th>
            <th>
                taal
            </th>
            <th>
                title
            </th>
            <th>
                beschrijving kort
            </th>
            <th>
                bedrijf
            </th>
            <th>
                admit
            </th>
            <th>

            </th>
        </tr>
        <?php
        foreach ($CLProject->getAllInfo() as $o) {
            echo "
    <tr>
    <td>
    <a href='?p=proj&id=$o->id'>
    <i class='fas fa-edit'></i>
</a>
    </td>

    <td>
    $o->id
    </td>
    <td>
    $o->lang
    </td>
        <td>
    $o->title
    </td>
        <td>
    $o->desc_short
    </td>
        <td>
   <div>
    $o->bedrijf_id
</div>
    </td>
            <td>
    $o->admit
    </td>
        <td>
    <a href='?p=proj&c=$o->id'>
    <i class='fa fa-trash' aria-hidden='true'></i>
</a>
    </td>
    </tr>
    
    
    ";
        }
        ?>
    </table>
</div>
