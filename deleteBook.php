<?php
    include("dataClass.php");

    $deleteBook = $_GET['bookIdDelete'];

    $obj = new data();
    $obj->setConnection();
    $obj->deleteBookData($deleteBook);

?>