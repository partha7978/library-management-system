<?php
    include("dataClass.php");
    session_start();

    $adminID =  $_SESSION['adminLogin'];  //storing the value of the admin id here which is present in the DB and we've entered in the form.'
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./images/iconLogoCheck.png" type="image/x-icon">

        <title>Admin Dashboard</title>

          <!-- For google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,900;1,100;1,200&display=swap" rel="stylesheet">

        <!-- for bootstrap -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="stylesheet" href="./styles/adminDashboard.css">

        <!-- For font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="./styles/admin-dashboard.css">
        <!--  for CSS -->
        <style>
            
            /* addperson page */
            .portion {
                width: 90%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .heading {
                width: 100%;
                height: 10%;
                font-size:1.3rem;
                margin: 0.5rem;
                display: block;
                position: relative;
                text-transform: uppercase;
                background-image: linear-gradient(to right, #5f0a87, #a4508b);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                letter-spacing: 3px;
                text-align: center;
            }
            .heading::after {
                content: "";
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 0.1em;
                background-image: linear-gradient(to right, #5f0a87, #a4508b);
            }
            .portion > form {
                width: auto;
                height: 90%;
                margin: 0.5rem;
            }
            .portion > form > label, .left-side-form>label, .right-side-form>label, .branch > label{
               margin: 0.5rem 0;
               background-image: linear-gradient(to right, #a4508b 0%, #5f0a87 74%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }



            /* for add book page  */
            .add-book-form {
                width: 90%;
                height: 100%;
                display: flex;
                flex-direction: row;
               
            }
            .left-side-form, .right-side-form {
                height: 100%;
                width: 50%;
                margin: 0.3rem 0.8rem;
            }
            .branch {
                text-transform: uppercase;
            }
            

            /* for student report page */
            .col-name {
                background-image: linear-gradient(to right, #a4508b 0%, #5f0a87 74%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .delBtn {
                background: transparent;
                outline: none;
                border: none;
                margin-left: 1rem;
            }
            .delBtn:hover {
                cursor: pointer;
                color: red;
            }
            .viewBook:hover {
                color: #8f54ab;
            }
            .fa-check:hover {
                color: green;
            }


        </style>
    </head>
    <body>
        <div class="main-container">
            <div class="admin-msg-content">
                <h3>Welcome <span class="text-gradient">Mr. Parth</span><h4>You are now an administrator.</h4></h3>
                
            </div>
           <div class="main-content">
               <div class="main-card">
                    <div class="left-side">
                        <ul>
                            <li>Admin</li>
                            <li onclick="openpart('addbook')">Add Book</li>
                            <li onclick="openpart('bookreport')">Book Report</li>
                            <li onclick="openpart('bookrequest')">Book Request</li>
                            <li onclick="openpart('addperson')">Add Student</li>
                            <li onclick="openpart('studentreport')">Student Report</li>
                            <li onclick="openpart('issuebook')">Issue Book</li>
                            <li onclick="openpart('issuereport')">Issue Report</li>
                            <li onclick="openpart('logout')"><a style="text-decoration:none; color:#f4f0fb;" href="login-admin-page.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="right-side">
                        <!--creating page for addstudent/addperson -->
                        <div id="addperson" class="portion" style="display:none;">
                            <p class="heading">Add Person</p>
                            <form action="addPersonServerPage.php" method="post" enctype="multipart/form-data">
                                <label>Name</label>
                                <input class="form-control" type="text" name="addname" placeholder="Enter Name">
                                <label>Email</label>
                                <input class="form-control" type="email" name="addemail" placeholder="xyz@gmail.com">
                                <label>Password</label>
                                <input class="form-control" type="password" name="addpass" placeholder="Enter Password">
                            
                                <label for="typw">Choose type</label>
                                <select class="form-select" aria-label="Default select example" name="type">
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                </select>

                                <input class="btn-general" type="submit" value="Submit">
                            </form>
                        </div>
                        <!--creating page for add book -->
                        <div id="addbook" class="portion" style="<?php if(!empty($_REQUEST['viewid'])){ echo "display:none"; } else { echo "display:block"; } ?>">
                            <p class="heading">Add Book</p>
                            <form class="add-book-form" action="addBookServerPage.php" method="post" enctype="multipart/form-data">
                                <div class="left-side-form">
                                    <label>Book Name</label>
                                    <input class="form-control" type="text" name="bookname" placeholder="Enter Book Name">
                                    <label>Details</label>
                                    <input class="form-control" type="text" name="bookdetail" placeholder="Enter Details">
                                    <label>Author</label>
                                    <input class="form-control" type="text" name="bookauthor" placeholder="Enter Author">
                                    <label>Publisher</label>
                                    <input class="form-control" type="text" name="bookpub" placeholder="Enter Publisher">
                                    <label>Price</label>
                                    <input class="form-control" type="number" name="bookprice" placeholder="Enter Price">
                                </div>
                                <div class="right-side-form">
                                    <div class="branch">
                                        <label>Branch</label><br>
                                        <input type="radio" name="branch" value="it">IT<br>
                                        <input type="radio" name="branch" value="phy">PHY<br>
                                        <input type="radio" name="branch" value="chem">CHEM<br>
                                        <input type="radio" name="branch" value="zoo">ZOOLOGY<br>
                                    </div>
                                  
                                    <label>Quantity</label>
                                    <input class="form-control" type="number" name="bookquantity" placeholder="Enter Quantity">
                                    <label>Book Photo</label>
                                    <input class="form-control" type="file" name="bookphoto" placeholder="Enter Photo">
                                    <input type="submit" value="Add Book" class="btn-general">
                                </div>
                            </form>
                        </div>

                        <!-- Creating for Book Report -->
                        <div id="bookreport" class="portion" style="display:none;">
                            <p class="heading">Book Report</p>
                            <?php
                                $u = new data;
                                $u->setConnection();
                                $u->getBook();
                                $recordset = $u->getBook();

                                $table = "<table class='table'><tr><th class='col-name'>Book Name</th><th class='col-name'>Author</th><th class='col-name'>Price</th><th class='col-name'>Quantity</th><th class='col-name'>Availability</th><th class='col-name'>Rent</th><th class='col-name'>Delete</th></tr>";
                                foreach ($recordset as $row) {
                                    $table.="<tr>";
                                    "<td>$row[0]</td>";
                                    $table.="<td>$row[1]</td>";
                                    $table.="<td>$row[3]</td>";
                                    $table.="<td>$row[5]</td>";
                                    $table.="<td>$row[8]</td>";
                                    $table.="<td>$row[9]</td>";
                                    $table.="<td>$row[10]</td>";
                                    $table.="<td><a href='deleteBook.php?bookIdDelete=$row[0]'><button class='delBtn'><i class='fa-solid fa-trash-can'></i></button></a></td>";
                                }
                                $table.="</table>";
                                echo $table;
                            ?>
                        </div>

                        <!-- creating page for student record -->
                        <div id="studentreport" class="portion" style="display:none;">
                            <p class="heading">Student Report</p>
                            <?php
                                $u = new data;
                                $u->setConnection();
                                $u->userdata();
                                $recordset = $u->userdata();

                                $table = "<table class='table'><tr><th class='col-name'>ID</th><th class='col-name'>Name</th><th class='col-name'>Email</th><th class='col-name'>Type</th><th class='col-name'>Delete</th></tr>";
                                foreach ($recordset as $row) {
                                    $table.="<tr>";
                                    "<td>$row[0]</td>";
                                    $table.="<td>$row[0]</td>";
                                    $table.="<td>$row[1]</td>";
                                    $table.="<td>$row[2]</td>";
                                    $table.="<td>$row[4]</td>";  //ive used 4th because in user data db the type stored in 4th column
                                    $table.="<td><a href='deleteuser.php?userIdDelete=$row[0]'><button class='delBtn'><i class='fa-solid fa-trash-can'></i></button></a></td>";
                                    $table.="</tr>";
                                }
                                $table.="</table>";
                                echo $table;
                            ?>
                        </div>

                        <!-- creating issue book  -->
                        <div id="issuebook" class="portion" style="display:none;">
                            <p class="heading">Issue Book</p>
                            <form class="issue-book-form" action="issueBookServerPage.php" method="post">
                               <label for="book">Choose Book</label>
                               <select class="form-control" name="book">
                                    <?php
                                        $u = new data;
                                        $u->setConnection();
                                        $u->getBookIssue();
                                        $recordset = $u->getBookIssue();
                                        foreach ($recordset as $row) {
                                            echo "<option value='$row[1]'>$row[1]</option>";
                                        }
                                    ?>
                               </select>
                               <label for="selectStudent">Name</label>
                               <select class="form-control" name="userselect">
                                    <?php
                                        $u = new data;
                                        $u->setConnection();
                                        $u->userdata();
                                        $recordset = $u->userdata();
                                        foreach ($recordset as $row) {
                                            echo "<option value='$row[1]'>$row[1]</option>";
                                        }
                                    ?>
                               </select>
                               <br>
                               <label for="date">Days</label>
                                 <input class="form-control" type="number" name="days" placeholder="Enter Days">
                                 <input type="submit" value="submit" class="btn-general">
                            </form>
                        </div>

                        <!-- creating issue book record -->
                        <div id="issuereport" class="portion" style="display:none;">
                            <p class="heading">Issue Report</p>
                            <?php
                                $u = new data;
                                $u->setConnection();
                                $u->getIssueReport();
                                $recordset = $u->getIssueReport();

                                $table = "<table class='table'><tr><th class='col-name'>Issue ID</th><th class='col-name'>User ID</th><th class='col-name'>User Name</th><th class='col-name'>Book Name</th><th class='col-name'>Type</th><th class='col-name'>Days</th><th class='col-name'>Issue Date</th><th class='col-name'>Return Date</th><th class='col-name'>Fine</th></tr>";
                                foreach ($recordset as $row) {
                                    $table.="<tr>";
                                    "<td>$row[0]</td>";
                                    $table.="<td>$row[0]</td>";
                                    $table.="<td>$row[1]</td>";
                                    $table.="<td>$row[2]</td>";
                                    $table.="<td>$row[3]</td>";
                                    $table.="<td>$row[4]</td>";
                                    $table.="<td>$row[5]</td>";
                                    $table.="<td>$row[6]</td>";
                                    $table.="<td>$row[7]</td>";
                                    $table.="<td>$row[8]</td>";
                                }
                                $table.="</table>";
                                echo $table;
                            ?>
                        </div>
                        

                        <!-- Book Request by student/teacher -->
                        <div id="bookrequest" class="portion" style="display:none;">
                            <p class="heading">Book Request</p>

                            <?php
                                $u = new data;
                                $u->setConnection();
                                $u->requestBookData();
                                $recordset = $u->requestBookData();

                                $table = "<table class='table'><tr><th class='col-name'>Request ID</th><th class='col-name'>User ID</th><th class='col-name'>User Name</th><th class='col-name'>Book Name</th><th class='col-name'>Type</th><th class='col-name'>Request Days</th><th class='col-name'>Approve</th><th class='col-name'>Delete</th></tr>";
                                foreach ($recordset as $row) {
                                    $table.="<tr>";
                                    "<td>$row[0]</td>";
                                    $table.="<td>$row[0]</td>";
                                    $table.="<td>$row[1]</td>";
                                    $table.="<td>$row[3]</td>";
                                    $table.="<td>$row[5]</td>";
                                    $table.="<td>$row[4]</td>";
                                    $table.="<td>$row[6]</td>";
                                    $table.="<td><a href='approveBookRequest.php?requestId=$row[0]&book=$row[3]&userselect=$row[2]&days=$row[5]'><button class='delBtn'><i class='fa-solid fa-check'></i></button></a></td>";
                                    $table.="<td><a href='deleteRequest.php?requestIdDelete=$row[0]'><button class='delBtn'><i class='fa-solid fa-trash-can'></i></button></a></td>";
                                    $table.="</tr>";
                                }
                                $table.="</table>";
                                echo $table;
                                
                            ?>
                        </div>

     

                    </div>
               </div>
           </div>
       </div>



       <script>
        const openpart = (part) => {
            let i;
            const parts = document.getElementsByClassName('portion');
           for(i=0; i<parts.length; i++) {
               parts[i].style.display = "none";
           }
            document.getElementById(part).style.display = 'block';
        }
       </script>
    </body>
    </html>