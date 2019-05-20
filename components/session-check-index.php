<?php
if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='tenant'){
    header("location:tenant_profile.php");
}
if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='landlord'){
    header("location:landlord_profile.php");
}
?>