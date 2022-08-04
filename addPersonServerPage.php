<?php
    include("dataClass.php");

    $addname = $_POST['addname'];
    $addemail = $_POST['addemail'];
    $addpass = $_POST['addpass'];
    $type = $_POST['type'];


    $obj = new data();
    $obj->setConnection();
    $obj->addNewUser($addname, $addpass, $addemail, $type);
?>