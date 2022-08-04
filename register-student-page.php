<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/iconLogoCheck.png" type="image/x-icon">

    <title>Register New</title>

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

    <!-- for animate.css -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <style>
        /*? for register new  */
        .stu-reg-page {
            background: url(./images/lib-img.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
            width: 100%;
            box-shadow: inset 0 0 0 100vw rgba(0, 0, 0, 0.38);
        }
        .buffer-content {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            width: 30%;
            height: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(214, 255, 253);
            border-radius: 20px 0px 0px 20px;
        }
        .buffer-content img {
            width: 70%;
            height: 70%;
        }
        .register-content {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            width: 26%;
            background-color: red;
            height: 80%;
            margin: 1rem 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            border-radius: 0px 20px 20px 0px;
            /* border-radius: 33px;
            box-shadow: 9px 9px 24px #dfe3f3, -9px -9px 24px #eff3fb; */
        }

        .animate__animated {
            animation-fill-mode: both;
            animation-duration: 1s;
            animation-name: bounce;
            animation-iteration-count: infinite;
            user-select: none;
        }
        form > a:hover {
            text-decoration: none;
            color: var(--light-mode-text-color);
        }
    </style>
        
    </style>
</head>


<body>

<?php
    $regEmailMsg = "";
    $regPassMsg = "";
    $confirmPassMsg = "";
    $msg = "";
    $name = "";

    if(!empty($_REQUEST['regEmailMsg'])) {
        $regEmailMsg = $_REQUEST['regEmailMsg'];
    }
    if(!empty($_REQUEST['regPassMsg'])) {
        $regPassMsg = $_REQUEST['regPassMsg'];
    }
    if(!empty($_REQUEST['confirmPassMsg'])) {
        $confirmPassMsg = $_REQUEST['confirmPassMsg'];
    }
    if(!empty($_REQUEST['name'])) {
        $name = $_REQUEST['name'];
    }
   
    ?>
<div class="main-container">
        <div class="main-content stu-reg-page">
            <div class="buffer-content">
                <img src="./images/stu-reading-book.png" alt="student reading pic">
            </div>
            <div class="register-content">
                <form action="register-page.php" method="get">
                    <label for="name">Username</label><span style="color:red; font-size:0.8rem; margin-left:0.2rem;"><?php echo $name ?></span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Username">
                    <label for="email">Email address</label><span style="color:red; font-size:0.8rem; margin-left:0.2rem;"><?php echo $regEmailMsg ?></span>
                    <input type="email" class="form-control" name="login_email" id="email" placeholder="xyz@gmail.com">
                    <p class="fw-light fs-8 text-muted" style="margin-bottom:0;">We'll never share your email with anyone else.</p> 
                    <label for="password">Password</label><span style="color:red; font-size:0.8rem; margin-left:0.2rem;"><?php echo $regPassMsg ?></span>
                    <input type="password" class="form-control" name="login_password" id="password" placeholder="Enter your password">
                    <label for="password">Confirm password</label><span style="color:red; font-size:0.8rem; margin-left:0.2rem;"><?php echo $confirmPassMsg ?></span>
                    <input type="password" class="form-control" name="login_password-confirm" id="password" placeholder="Confirm password">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option value="student">Student</option>
                        <option value="admin">Teacher</option>
                    </select>
                    <button class="btn-general" style="margin: 2rem 1rem 2rem 0;">Register</button>
                    <a href="home.php" style="margin: 2rem 1rem 2rem 0; text-decoration:none;" class="btn-general">Go back</a>
                </form>
            </div>
        </div>
</body>