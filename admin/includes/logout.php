<?php
    session_start();
    session_destroy();
    setcookie('username', $username, time()-86400, "/", "", 0);
    setcookie("pw", md5($password), time() - 86400, "/", "" , 0);
    header("location: ../../signin.php");
    exit();
?>