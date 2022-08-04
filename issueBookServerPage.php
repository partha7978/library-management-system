<?php
    include("dataClass.php");

    $book = $_POST['book'];
    $userSelect = $_POST['userselect'];
    $getDate = date("d-m-y");
    $days = $_POST['days'];
    $returnDate = Date("d-m-y", strtotime("+".$days."days"));


    $obj = new data();
    $obj->setConnection();
    $obj->issuebook($book,$userSelect,$days,$getDate,$returnDate);


?>