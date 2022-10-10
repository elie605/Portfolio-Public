<?php


?>
<div id="Login" class="container-fluid">
    <form method="post"  name="login" >
        <div class="row e1_Title">
            <div class="col-xl-2"></div>
            <div class="col-xl-1"><label><b>Username:</b></label></div>
            <div class="col-xl-4">
                <input type="text" class="form-control" name="txtGeb" placeholder="Username">
            </div>
            <div class="col-xl-2"></div>
        </div>
        <div class="row mt-2">
            <div class="col-xl-2"></div>
            <div class="col-xl-1"><label><b>Password:</b></label></div>
            <div class="col-xl-4">
                <input type="password" class="form-control" name="txtPp" placeholder="Password">
            </div>
            <div class="col-xl-2"></div>
        </div>
        <div class="row mt-2">
            <div class="col-xl-2"></div>
            <div class="col-xl-1"></div>
            <div class="col-xl-4">
                <button name="btnsub" type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </form>
</div>
<?php
if (isset($_POST['btnsub']) && isset($_POST['txtPp']) && isset($_POST['txtGeb'])){
    $CLLogin = new Login($CLDatabase);

            $CLLogin->login($_POST['txtGeb'],$_POST['txtPp']);

}
?>