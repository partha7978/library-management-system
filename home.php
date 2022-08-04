<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/iconLogoCheck.png" type="image/x-icon">

    <title>Kanika Library</title>

    <!-- for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- For font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,900;1,100;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">

    <style>
        form > a:hover {
            text-decoration: none;
            color: var(--light-mode-text-color);
        }
    </style>
</head>




<?php
    $emailmsg = "";
    $pasdmsg = "";
    $msg = "";

    $ademailmsg = "";
    $adpasdmsg = "";

    if(!empty($_REQUEST['ademailmsg'])) {
        $ademailmsg = $_REQUEST['ademailmsg'];
    }
    if(!empty($_REQUEST['adpasdmsg'])) {
        $adpasdmsg = $_REQUEST['adpasdmsg'];
    }
    if(!empty($_REQUEST['emailmsg'])) {
        $emailmsg = $_REQUEST['emailmsg'];
    }
    if(!empty($_REQUEST['pasdmsg'])) {
        $pasdmsg = $_REQUEST['pasdmsg'];
    }
    if(!empty($_REQUEST['msg'])) {
        $msg = $_REQUEST['msg'];
    }
    ?>
<body>
    <div class="main-container">
        <div class="navBar">
            <span style="margin-left:1rem;font-weight: 600;" class="gradient">KANIKA LIBRARY</span>
        </div>
        <div class="main-content">
           <div class="main-login-page">
                <div class="heading">
                    <span>Welcome to<span class="gradient"> Kanika Library</span></span>
                </div>
                <div class="login-content">
                    <div class="student-login">
                       <form action="login-student-page.php" method="get">
                           <h3>Student/Teacher Login</h3>
                            <label for="email">Email address</label><span style="color:red; font-size:0.8rem; margin-left:0.2rem;"><?php echo $emailmsg ?></span>
                            <input type="email" class="form-control" name="login_email" id="email" placeholder="xyz@gmail.com">
                            <p class="fw-light fs-8 text-muted">We'll never share your email with anyone else.</p> 
                            <label for="password">Password</label><span style="color:red; font-size:0.8rem; margin-left:0.2rem;"><?php echo $pasdmsg ?></span>
                            <input type="password" class="form-control" name="login_password" id="password" placeholder="Enter your password">
                            <button class="btn-general" style="margin: 2rem 1rem 2rem 0;">Login</button>

                            <a href="register-student-page.php" style="margin: 2rem 1rem 2rem 0; text-decoration:none;" class="btn-general">Register</a>
                        </form>
                    </div>
                    <div class="admin-login">
                            <form action="login-admin-page.php" method="get">
                                <h3>Admin Login</h3>
                                <label for="email">Email address</label><span style="color:red; font-size:0.8rem; margin-left:0.2rem;"><?php echo $ademailmsg ?></span>
                                <input type="email" class="form-control" name="login_email" id="email" placeholder="xyz@gmail.com">
                                <p class="fw-light fs-8 text-muted">We'll never share your email with anyone else.</p> 
                                <label for="password">Password</label><span style="color:red; font-size:0.8rem; margin-left:0.2rem;"><?php echo $adpasdmsg ?></span>
                                <input type="password" class="form-control" name="login_password" id="password" placeholder="Enter your password">
                                <button class="btn-general">Login</button>
                            </form>
        
                    </div>
                </div>
                <div class="main-error">
                <span><?php echo $msg ?></span>
                </div>
           </div>
        </div>
    </div>
</body>
</html>