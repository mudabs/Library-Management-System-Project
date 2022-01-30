<?php
session_start();
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com.ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="reg_header">
        <span class = "reg_logo">
           <h3 style="color:white; float: left;padding-top: 20px; padding-left: 10px; font-family:'Lato', sans-serif;">LIBRARY MANAGEMENT SYSTEM</h3>
        </span>
            <?php
            if(isset($_SESSION['login_user']))
            {
                //end of php 
                ?> 
                <nav class = "nav">
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="books.php">BOOKS</a></li>
                        <li><a href="member.php">MEMBER-INFORMATION</a></li>
                        <li><a href="profile.php">PROFILE</a></li>
                        <li><a href="feedback.php">COMMENTS</a></li>

                    </ul>
                </nav>
                <nav class = "sign">
                    <ul>
                        <a href="profile.php" style = "text-decoration:none;">
                            <li style = "color:white;">
                                        
                                        <?php
                                            echo "<img class = 'user_icon' src='icons/".$_SESSION['pic']."' >"; //shows person image 
                                            echo $_SESSION['login_user'];
                                        ?>  
                            </li>
                        </a>
                    
                        <li><a href="logout.php"><span class = "glyphicon glyphicon-log-out"></span>_LOGOUT</a></li>
                    </ul>
                </nav>
                <?php //start of php
            }
            else
            {
                ?>
                <nav class = "nav">
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="books.php">BOOKS</a></li>
                        <li><a href="feedback.php">COMMENTS</a></li>
                        
                    </ul>
                </nav>
                <nav class = "sign">
                    <ul>
                        <li><a href="admin_login.php" ><span class = "glyphicon glyphicon-log-in"></span>_LOGIN</a></li>
                        <li><a href="registration.php"><span class = "glyphicon glyphicon-user"></span>_REGISTER</a></li>
                        
                    </ul>
                </nav>
                <?php
            }
                
            ?>
        </header>
</body>

</html>