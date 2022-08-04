<?php
    include("dataClass.php");

    $login_email = $_GET['login_email'];
    $login_password = $_GET['login_password'];


    if($login_email == null || $login_password == null) {
        
        $emailmsg = "";
        $pasdmsg = "";
        if($login_email == null) {
            $emailmsg = "* Email is required";
        }
        if($login_password == null) {
            $pasdmsg = "* Password is required";
        }
        header("Location:home.php?emailmsg=$emailmsg&pasdmsg=$pasdmsg");
    }
    elseif($login_email!==null && $login_password!==null) {
        $obj = new data();
        $obj->setConnection();
        $obj->userLogin($login_email, $login_password);
    }
?>