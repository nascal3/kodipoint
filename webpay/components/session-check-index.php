<?php
    if($_SESSION['usertype']=='tenant'){
        header("location:tenant_profile.php");
    }
	 if($_SESSION['usertype']=='landlord'){
        header("location:landlord_profile.php");
    }
?>