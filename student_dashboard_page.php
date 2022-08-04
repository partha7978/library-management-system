<?php

session_start();
$userloginid=$_SESSION["userid"] = $_GET['userlogid'];


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="./images/iconLogoCheck.png" type="image/x-icon">

        <title>Student Dashboaard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </head>
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
                margin: 0.5rem 0.5rem 0.5rem 0;
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
            .gradient-text {
                background-image: linear-gradient(to right, #5f0a87, #a4508b);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-weight: 500;
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
    <body>

    <?php
   include("dataClass.php");
    ?>
           <div class="main-container">
           <?php
                $u = new data;
                $u->setConnection();
                $u->userDetail($userloginid);
                $recordset = $u->userDetail($userloginid);
                foreach ($recordset as $row) {
                    $name = $row[1];
                    $email = $row[2];
                    $pass = $row[3];
                    $type = $row[4];
                
                }
            ?>
                <div class="admin-msg-content">
                    <h3>Welcome <span class="text-gradient"><?php echo $name ?></span><h4>You're a <?php echo $type ?></h4></h3>
                </div>
                <div class="main-content">
                    <div class="main-card">
                        <div class="left-side">
                            <ul>
                                <li onclick="openpart('myaccount')">My Account</li>
                                <li onclick="openpart('requestbook')">Request Book</li>
                                <li onclick="openpart('bookreport')">Book Report</li>
                                <li><a style="text-decoration:none; color:#f0f4f6" href="home.php">Logout</a></li>
                            </ul>
                        </div>   

                        <div class="right-side">   
                            <div id="myaccount" class="portion" style="display:none">
                                <p class="heading">My Account</p>
                                <p style="color:black"><u class="gradient-text">Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
                                <p style="color:black"><u class="gradient-text">Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
                                <p style="color:black"><u class="gradient-text">Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>
                            </div>

                            <!-- for request book -->
                            <div id="requestbook" class="portion" style="display:none">
                                <p class="heading">Request Book</p>
                                <form class="issue-book-form" action="requestBookStudent.php" method="post">
                                    <label for="book">Choose Book</label>
                                    <select name="book" class="form-control">
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
                                    <select name="userselect" class="form-control">
                                            <?php
                                                echo "<option value='$name'>$name</option>";
                                            ?>
                                    </select>
                                    <label for="date">Days</label>
                                    <input class="form-control" type="number" name="days" placeholder="Enter Days">
                                    <input type="submit" value="submit" class="btn-general">
                                </form>
                            </div>


                            <!-- for book report -->
                            <div id="bookreport" class="portion" style="display:none">
                                <p class="heading">Book Report</p>

                                <?php
                                $u = new data;
                                $u->setConnection();
                                $u->getBookReport($userloginid);
                                $recordset = $u->getBookReport($userloginid);

                                $table = "<table class='table'><tr><th class='col-name'>Book Name</th><th class='col-name'>Issue Date</th><th class='col-name'>Issue Return</th><th class='col-name'>Fine</th></tr>";
                                foreach ($recordset as $row) {
                                    $table.="<tr>";
                                    "<td>$row[0]</td>";
                                    $table.="<td>$row[3]</td>";
                                    $table.="<td>$row[6]</td>";
                                    $table.="<td>$row[7]</td>";
                                    $table.="<td>$row[8]</td>";
                                }
                                $table.="</table>";
                                echo $table;
                            ?>
                            </div>
                        </div>  
                     </div>
                </div>


           </div>


         

        </div>
        </div>


        <script>
        function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            document.getElementById(portion).style.display = "block";  
        }

   
 
        
        </script>
    </body>
</html>