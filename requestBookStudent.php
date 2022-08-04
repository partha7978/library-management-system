<?php
    include("dataClass.php");

    $book = $_POST['book'];
    $userSelect = $_POST['userselect'];
    $getDate = date("d-m-y");
    $days = $_POST['days'];


    $obj = new data();
    $obj->setConnection();
    $obj->requestBookByStudent($book,$userSelect,$days,$getDate);


?>