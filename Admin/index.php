<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com.ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .nav{
            margin-top:30px;
        }

        .sign{
            margin-top: 30px;
        }

        .nav{
            margin-top: 40px;
        }

        
    </style>
</head>

<body>
    <div class = "wrap">
        <header class="main_header">
            <div class = "logo">
                <img src="icons/librarywhite.ico" alt="library" style="height: 90px; padding-left:100px; padding-top:10px;"> 
               <h3 style="color:white;">LIBRARY MANAGEMENT SYSTEM</h3>
            </div>

            <?php
            if(isset($_SESSION['login_user']))
            {
                //end of php 
                ?> 
                <nav class = "nav">
                    <ul>
                        <li><a href="index.php"><h4>HOME</h4></a></li>
                        <li><a href="books.php"> <h4>BOOKS</h4></a></li>
                        <li><a href="member.php"> <h4>MEMBER-INFORMATION</h4></a></li>
                        <li><a href="profile.php"> <h4>PROFILE</h4></a></li>
                        <li><a href="feedback.php"> <h4>COMMENTS</h4></a></li>
                    </ul>
                </nav>
                <nav class = "sign">
                    <ul>
                    <li style = "color:white;">
                                     
                                    <?php
                                        echo "<img class = 'user_icon' src='icons/".$_SESSION['pic']."' >"; //shows person image 
                                        echo $_SESSION['login_user'];
                                    ?>  
                        </li>
                        <li><a href="logout.php"><span class = "glyphicon glyphicon-log-out"></span>_LOGOUT</a></li>
                    </ul>
                </nav>
                <?php //start of php
            }
            else
            {
                ?>
                <nav class = "nav ">
                    <ul>
                    <li><a href="index.php"><h4>HOME</h4></a></li>
                        <li><a href="books.php"><h4>BOOKS</h4></a></li>
                        <li><a href="feedback.php"><h4>COMMENTS</h4></a></li>
                    </ul>
                </nav>
                <nav class = "sign">
                    <ul>
                        <li><a href="admin_login.php">  <span class = "glyphicon glyphicon-log-in"></span>_LOGIN</a></li>
                        <li><a href="registration.php"><span class = "glyphicon glyphicon-user"></span>_REGISTER</a></li>
                    </ul>
                </nav>
                <?php
            }
                
            ?>

            
        </header>
        
        <section style = "height :600px;">
            <div class="main_sec" style="height:600px;">
                <br><br>
                <div class="box">
                    <br><br>
                    <h1 style="text-align: center; font-size: 35px; color: white;">Welcome to Libs</h1> <br>
                    <h1 style="text-align: center; font-size: 20px; color: white;">Opens at: 09:00</h1>
                    <h1 style="text-align: center; font-size: 20px; color: white;">Closes at: 15:00</h1>
                </div>
            </div>
        </section>
        <footer>
            <br>
            <p style = "color: white;text-align: center;">
                Contact us on social media:
            </p>
            
            <div class = "mydiv">
                <a href=""><img src="icons/gmail.ico" alt="gmail" class = "footer_icons"></a>
                <a href=""><img src="icons/whatsapp.ico" alt="app" class = "footer_icons"></a>
                <a href=""><img src="icons/instagram.ico" alt="gram" class = "footer_icons"></a>
                <a href=""><img src="icons/twitter.ico" alt="twitter" class = "footer_icons"></a>
                <a href=""><img src="icons/facebook.ico" alt="facebook" class = "footer_icons"></a>
            </div>
            <br> <br>
            <p style="color: white;text-align: center;">
                Email: mudaburamunashe@gmail.com <br> <br>
                Cell: +263771567679
            </p>
        </footer>
    </div>
    
</body>
</html>