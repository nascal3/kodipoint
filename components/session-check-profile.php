<?php
    session_start();
    require '_database/database.php';
    $user_username = mysqli_real_escape_string($conn,$_REQUEST['profile']);
    
?>