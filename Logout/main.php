<?php
$CLLogin = new Login($CLDatabase);
$CLLogin->logout();
header("location: SomeUrlHere/eloi/home ");

?>