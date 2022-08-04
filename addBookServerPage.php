<?php
    include("dataClass.php");

    $bookname = $_POST['bookname'];
    $bookdetail = $_POST['bookdetail'];
    $bookauthor = $_POST['bookauthor'];
    $bookpub = $_POST['bookpub'];
    $bookprice = $_POST['bookprice'];
    $branch = $_POST['branch'];
    $bookquantity = $_POST['bookquantity'];
    

    if(move_uploaded_file($_FILES["bookphoto"]["tmp_name"], "uploads/" . $_FILES["bookphoto"]["name"])) {
        echo "File uploaded successfully";
        $bookphoto = $_FILES["bookphoto"]["name"];
        $obj = new data();
        $obj->setConnection();
        $obj->addbook($bookname,$bookdetail,$bookauthor,$bookpub,$bookprice,$bookquantity,$bookphoto,$branch);
    
    }
    else {
        echo "File upload failed";
    }
?>