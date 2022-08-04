<?php
    include("dataClass.php");

    $deleteUser = $_GET['userIdDelete'];

    $obj = new data();
    $obj->setConnection();
    $obj->deleteUserData($deleteUser);
?>