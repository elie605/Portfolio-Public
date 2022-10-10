<?php
$CLContent = new CMScontent($CLDatabase);


if (isset($_GET['id'])) {
    $CLContent->setInfo($_GET['id']);

}
if (isset($_GET['c'])) {
    $CLContent->clearField($_GET['c']);
}
?>
<div class="col-xl-1">
</div>
<div class="col-xl-3">
    <div class="row">
        <div class="col-xl-12">
            <h3>Content:</h3>
        </div>
    </div>
    <form method="post">
        <fieldset disabled>


            <div class="row">
                <div class="col-xl-2">
                    <label><b>module:</b></label>
                </div>
                <div class="col-xl-4">
                    <?php
                    if (isset($_GET['id'])) {
                        $CLContent->getModuleOptId();
                    } else$CLContent->getModuleOpt();

                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-2">
                    <label><b>page:</b></label>
                </div>
                <div class="col-xl-4">
                    <?php
                    if (isset($_GET['id'])) {
                        $CLContent->getPagesOptId();
                    } else $CLContent->getPagesOpt();

                    ?>
                </div>
            </div>
        </fieldset>
        <fieldset <?php
        if (isset($_GET['id'])) {
            echo "";
        } else echo "disabled";

        ?>>


            <div class="row">
                <div class="col-xl-2">
                    <label><b>admit:</b></label>
                </div>
                <div class="col-xl-4">
                    <?php
                    if (isset($_GET['id'])) {
                        $CLContent->getAdmitOptId();
                    } else $CLContent->getAdmitOpt();
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-2">
                    <label><b>text:</b></label>
                </div>
                <div class="col-xl-10">
                <textarea name="txtText"><?php
                    if (isset($_GET['id'])) {
                        echo $CLContent->getText();
                    }
                    ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-2">
                    <button name="btnSubmit" type="submit" class="btn btn-primary">
                        <?php
                        if (isset($_GET['id'])) {
                            echo "Aanpassen";
                        } else echo "Toevoegen";

                        ?></button>
                </div>
            </div>
        </fieldset>
    </form>
    <?php
    if (isset($_GET['id']) && isset($_POST['btnSubmit'])){
        if ( $_POST['admit'] > 3 ||$_POST['admit'] < 0){
            echo "wierdo";
        }
        $CLContent->alterInfo($_GET['id'],$_POST['txtText'], $_POST['admit']);
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
                module
            </th>
            <th>
                page
            </th>
            <th>
                text
            </th>
            <th>
                admit
            </th>
            <th>

            </th>
        </tr>
        <?php
        foreach ($CLContent->getAllInfo() as $o) {
            echo "
    <tr>
    <td>
    <a href='?p=cont&id=$o->ID'>
    <i class='fas fa-edit'></i>
</a>
    </td>

    <td>
    $o->ID
    </td>
    <td>
    $o->lang
    </td>
        <td>
    $o->module
    </td>
        <td>
    $o->page
    </td>
        <td>
   <div>
    $o->text
</div>
    </td>
            <td>
    $o->admit
    </td>
        <td>
    <a href='?p=cont&c=$o->ID'>
    <i class='fa fa-trash' aria-hidden='true'></i>
</a>
    </td>
    </tr>
    
    
    ";
        }
        ?>
    </table>
</div>
