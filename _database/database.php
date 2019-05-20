<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "kodipoint_live";
    $prefix = "";
    //$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
    //mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");
    $conn=mysqli_connect($hostname,$user,$password,$database);
?>