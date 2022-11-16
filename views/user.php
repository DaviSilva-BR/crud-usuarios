<?php
if(!isset($_SESSION['userLoginStatus'])){
    header("Location:?logout=1");
}
include('inc/header.php');


include('inc/footer.php');
?>