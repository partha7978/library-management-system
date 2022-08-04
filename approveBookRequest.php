<?php
    include("dataClass.php");

    $requestId = $_GET['requestId'];
    $requestBook = $_GET['book'];
    $userselect = $_GET['userselect'];
    $days = $_GET['days'];
    $getDate = date("d-m-y");

    $returnDate = Date('d-m-y', strtotime("+".$days."days"));

    $obj = new data();
    $obj->setConnection();
    $obj->approveBookRequest($requestId,$requestBook,$userselect,$days,$getDate,$returnDate);

?>