<?php
    if(!$_SESSION['userid']){
        header("location:login.php?session=notset");
    }
?>