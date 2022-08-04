<?php
    // session_start();  
    include("database.php");  // same as import in css   to merge another PHP file

    class data extends db {

        private $bookpic;
        private $bookname;
        private $bookdetail;
        private $bookauthor;  //here im declaring necessary var as private
        private $bookpub;
        private $branch;
        private $bookprice;
        private $bookquantity;
        private $type;
        private $book;
        private $userselect;
        private $days;
        private $getdate;
        private $returnDate;

        function __construct() {   //__construct is used to create a constructor
            // echo 'working';
        }

        function adminLogin($mail, $pass) {
            $query = "SELECT * FROM admin where email='$mail' AND pass='$pass' ";    //here checking weather the data comming from form is present in the DB or not.
            $recordSet = $this->connection->query($query);  //this line will check the connection and execute the query.
            $result = $recordSet->rowCount(); //rowCount() is a pre defined function and it  will check the number of rows in the table.


            if($result > 0) {
                foreach($recordSet->fetchAll() as $row) {   
                    $logId = $row['id'];  //here ive used a foreach loop for the sql query ans in logid  ive added the value of the id present in  DB.
                } 
                $_SESSION['adminLogin'] = $logId;  //here ive used a session variable to store the value of the id. so I dont need to pass the pass through header(otherwise it will apppear in the link.) 
                header("Location:admin_dashboard_page.php");  //here ive used a header function to redirect to the admin_dashboard_page.php
            }
            elseif($result <= 0) {
                header("Location:home.php?msg=Invalid credentials");
            }
        } 

        // //!creating func for adminServerPage
        function addNewUser($name,$pass,$email,$type) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->type = $type;
            $query = "INSERT INTO userdata(id, name, email, pass, type)VALUES('', '$name', '$email', '$pass', '$type')";

            if($this->connection->exec($query)) {
                header("Location:admin_dashboard_page.php?msg=User registered successfully");
            }
            else {
                header("Location:admin_dashboard_page.php?msg=User registration failed");
            }
        }

        // //!creating func for add book entry
        function addbook($bookname,$bookdetail,$bookauthor,$bookpub,$bookprice,$bookquantity,$bookphoto,$branch) {
            $this->bookname = $bookname;
            $this->bookdetail = $bookdetail;
            $this->bookauthor = $bookauthor;
            $this->bookpub = $bookpub;
            $this->bookprice = $bookprice;
            $this->bookquantity = $bookquantity;
            $this->bookphoto = $bookphoto;
            $this->branch = $branch;


            $query = "INSERT INTO book(id, bookname, bookdetail, bookauthor, bookpub, bookprice,  bookphoto, branch, bookquantity, bookavail, bookrent)VALUES('', '$bookname', '$bookdetail', '$bookauthor', '$bookpub', '$bookprice', '$bookphoto', '$branch', '$bookquantity', '$bookquantity', 0)";

            if($this->connection->exec($query)) {
                header("Location:admin_dashboard_page.php?msg=Book added successfully");
            }
            else {
                header("Location:admin_dashboard_page.php?msg=Book addition failed");
            }
        }

        // //!for showing all user data when clicking on the student report button
        function userdata() {
            $query = "SELECT * FROM userdata";
            $data = $this->connection->query($query);
            return $data;
        }


        //!for deleting user data
        function deleteUserData($id) {   //the id was retrived from the parameter
            $query = "DELETE FROM userdata WHERE id='$id'";
            if($this->connection->exec($query)) {
                header("Location:admin_dashboard_page.php?msg=User deleted successfully");
            }
            else {
                header("Location:admin_dashboard_page.php?msg=User deletion failed");
            }
        }


        //!for view book/ book reportpage
        function getBook() {
            $query = "SELECT * FROM book";
            $data = $this->connection->query($query);
            return $data;
        }
        // //!for deleting a book
        function deleteBookData($id) {
            $query = "DELETE FROM book WHERE id='$id'";
            if($this->connection->exec($query)) {
                header("Location:admin_dashboard_page.php?msg=Book deleted successfully");
            }
            else {
                header("Location:admin_dashboard_page.php?msg=Book deletion failed");
            }
        }

        // //!for seeing issue book
        function getBookIssue() {
            $q = "SELECT * FROM book WHERE bookavail !=0";
            $data = $this->connection->query($q);
            return $data;
        }


        //!book issue 
        function issuebook($book,$userSelect,$days,$getDate,$returnDate) {
            $this->$book = $book;
            $this->$userSelect = $userSelect;
            $this->$days = $days;
            $this->$getDate = $getDate;
            $this->$returnDate = $returnDate;

            $q= "SELECT * FROM book where bookname='$book'";
            $recordSetss = $this->connection->query($q);

            $q = "SELECT * FROM userdata where name='$userSelect'";
            $recordSet = $this->connection->query($q);
            $result = $recordSet->rowCount();

            if($result > 0) {
                foreach($recordSet->fetchAll() as $row) {
                    $issueid = $row['id'];
                    $issuetype = $row['type'];
                }
                foreach($recordSetss->fetchAll() as $row) {
                    $bookId = $row['id'];
                    $bookName = $row['bookname'];
                    
                    $newbookavail = $row['bookavail']-1;
                    $newbookrent = $row['bookrent']+1;
                }

                $query="UPDATE book SET bookavail='$newbookavail', bookrent='$newbookrent' WHERE id='$bookId'";
                if($this->connection->exec($query)) {
                   $query="INSERT into issuebook(userid, issuename, issuebook, issuetype, issuedays, issuedate, issuereturn)VALUES('$issueid', '$userSelect', '$bookName', '$issuetype', '$days', '$getDate', '$returnDate')";
                    
                   if($this->connection->exec($query)) {
                        header("Location:admin_dashboard_page.php?msg=Book issued successfully&$getDate");
                    }
                    else {
                        header("Location:admin_dashboard_page.php?msg=Book issue failed");
                    }
                }
            }
            else
            {
                header("Location:admin_dashboard_page.php?msg=User not found");
            }
        }


        //! to Show issue book report
        function getIssueReport() {
            $q = "SELECT * FROM issuebook WHERE id !=0";
            $data = $this->connection->query($q);
            return $data;
        }

        //! to Show book request
        function requestBookData() {
            $q = "SELECT * FROM bookrequest WHERE id !=0";
            $data = $this->connection->query($q);
            return $data;
        }

        //!approve book request
        function approveBookRequest($requestId,$requestBook,$userselect,$days,$getDate,$returnDate) {
            $this->$requestId = $requestId;
            $this->$requestBook = $requestBook;
            $this->$userselect = $userselect;
            $this->$days = $days;
            $this->$getDate = $getDate;
            $this->$returnDate = $returnDate;

            $q= "SELECT * FROM book where bookname='$requestBook'";
            $recordSetss = $this->connection->query($q);

            $q = "SELECT * FROM userdata where name='$userselect'";
            $recordSet = $this->connection->query($q);
            $result = $recordSet->rowCount();

            if($result > 0) {
                foreach($recordSet->fetchAll() as $row) {
                    $issueid = $row['id'];
                    $issuetype = $row['type'];
                }
                foreach($recordSetss->fetchAll() as $row) {
                    $bookId = $row['id'];
                    $bookName = $row['bookname'];
                    
                    $newbookavail = $row['bookavail']-1;
                    $newbookrent = $row['bookrent']+1;
                }

                $query="UPDATE book SET bookavail='$newbookavail', bookrent='$newbookrent' WHERE id='$bookId'";
                if($this->connection->exec($query)) {
                   $query="INSERT into issuebook(userid, issuename, issuebook, issuetype, issuedays, issuedate, issuereturn)VALUES('$issueid', '$userselect', '$bookName', '$issuetype', '$days', '$getDate', '$returnDate')";
                    
                   if($this->connection->exec($query)) {
                        header("Location:admin_dashboard_page.php?msg=Book issued successfully&$getDate");
                    }
                    else {
                        header("Location:admin_dashboard_page.php?msg=Book issue failed");
                    }
                }
            }
            else
            {
                header("Location:admin_dashboard_page.php?msg=User not found");
            }
        }



        //todo  FOR STUDENT LOGIN PAGE 
        function userLogin($mail, $pass) {
            $query = "SELECT * FROM userdata where email='$mail' AND pass='$pass' ";    //here checking weather the data comming from form is present in the DB or not.
            $recordSet = $this->connection->query($query);  //this line will check the connection and execute the query.
            $result = $recordSet->rowCount(); //rowCount() is a pre defined function and it  will check the number of rows in the table.


            if($result > 0) {
                foreach($recordSet->fetchAll() as $row) {   
                    $logId = $row['id'];  //here ive used a foreach loop for the sql query ans in logid  ive added the value of the id present in  DB.
                    $_SESSION['userlogid'] = $logId;
                    header("Location:student_dashboard_page.php?userlogid=$logId");  
                } 
            
            }
            elseif($result <= 0) {
                header("Location:home.php?msg=Invalid credentials");
            }
            else {
                header("Location:home.php?msg=Invalid credentials");
            }
        } 


        //!for student details in student pages
        function userDetail($id) {
            $q = "SELECT * FROM userdata WHERE id='$id'";
            $data = $this->connection->query($q);
            return $data;
        }

        //!for request book by student 
        function requestBookByStudent($book,$userSelect,$days,$getDate) {
            $this->$book = $book;
            $this->$userSelect = $userSelect;
            $this->$days = $days;
            $this->$getDate = $getDate;
            
            $q= "SELECT * FROM book where bookname='$book'";
            $recordSetss = $this->connection->query($q);

            $q = "SELECT * FROM userdata where name='$userSelect'";
            $recordSet = $this->connection->query($q);
            $result = $recordSet->rowCount();


            if($result > 0) {
                foreach($recordSet->fetchAll() as $row) {
                    $issueid = $row['id'];
                    $issuetype = $row['type'];
                }
                foreach($recordSetss->fetchAll() as $row) {
                    $bookId = $row['id'];
                }
                $query="INSERT into bookrequest(id, userid, bookid, username, usertype, bookname, issuedays)VALUES('', '$issueid', '$bookId', '$userSelect', '$issuetype', '$book', '$days')";
                
                if($this->connection->exec($query)) {
                    header("Location:student_dashboard_page.php?userlogid=$issueid&msg=Book request successfully");
                }
                else {
                    header("Location:student_dashboard_page.php?userlogid=$issueid&msg=Book request failed");
                }

            }

        }

        //!for showuing book report to student dashboard
        function getBookReport($id) {
            $q = "SELECT * FROM issuebook WHERE userid=$id";
            $data = $this->connection->query($q);
            return $data;
        } 


        //!register new student/teacher
        
        function registerUser($name, $login_email, $login_password, $type) {
            $this->$name = $name;
            $this->$login_email = $login_email;
            $this->$login_password = $login_password;
            $this->$type = $type;

            $query = "INSERT INTO userdata(id, name, email, pass, type)VALUES('', '$name', '$login_email', '$login_password', '$type')";

            if($this->connection->exec($query)) {
                header("Location:home.php?msg=User registered successfully");
            }
            else {
                header("Location:register-student-page.php?msg=User registration failed");
            }
        } 
    }
?>