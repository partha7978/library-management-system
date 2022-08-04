<?php
    include("dataClass.php");

    $login_email = $_GET['login_email'];
    $login_password = $_GET['login_password'];
    $confirm_password = $_GET['login_password-confirm'];
    $type = $_GET['type'];
    $name = $_GET['name'];

    if($login_email == null || $login_password == null || $confirm_password == null || $type == null || $name == null) {
        $regEmailMsg = "";
        $regPassMsg = "";
        $confirmPassMsg = "";
        if($login_email == null) {
            $regEmailMsg = "* Email is required";
        }
        if($login_password == null) {
            $regPassMsg = "* Password is required";
        }
        if($confirm_password == null) {
            $confirmPassMsg = "* Confirm Password is required";
        }
     
        if($type == null) {
            $type = "* Type is required";
        }
        if($name == null) {
            $name = "* Name is required";
        }
        header("Location:register-student-page.php?regEmailMsg=$regEmailMsg&regPassMsg=$regPassMsg&confirmPassMsg=$confirmPassMsg&type=$type&name=$name");
    }
    elseif($login_password != $confirm_password) {
            $confirmPassMsg = "* Password does not match";
            header("Location:register-student-page.php?confirmPassMsg=$confirmPassMsg");
    }
    elseif($login_email!==null && $login_password!==null && $confirm_password!==null && $type!==null && $name!==null) {
        $obj = new data();
        $obj->setConnection();
        $obj->registerUser($name, $login_email, $login_password, $type);
    }
?>