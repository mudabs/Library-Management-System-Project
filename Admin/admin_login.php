<?php
    include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login</title>
    <link rel="stylesheet" href="style.css">

    <style>
        p a{
            color: yellow;
        }

        p a:hover{
            opacity:0.8;
        }
    </style>
</head>

<body>


    <section>
        <div class="login_image">
            <br>
            <h1 style="font-size:xx-large; text-align: center; color: white; font-style: calbri;"> <b>MEMBER</b> <span style="font-weight: lighter;">Login</span></h1>
            <div class="login_box">

                <br>
                <h2 style="color: white; padding-left: 70px;">Sign In</h2>
                <br>
                <div class="login_form">
                    <form name="Login" action="" method="post">
                        <input type="text" name="username" placeholder="Username" required = ""> <br> <br>
                        <input type="password" name="password" placeholder="Password" required =""> <br> <br>
                        <button type="submit" name = "submit">Login</button>
                    </form>
                    <p> <a style=" text-decoration:none; color: yellow; padding-right: 120px;" href="update_password.php">Forgot Password?</a>;
                        <a style="text-decoration:none;,color: yellow;" href="registration.php">Sign Up</a>
                    </p>
                </div>
                
            </div>
            
        </div>
    </section>


<?php
    if(isset($_POST['submit']))
    {
        $rowCount = 0; // stores number of rows that are a match
        $res = mysqli_query($db,"SELECT * FROM `admin` WHERE username = '$_POST[username]' && password = '$_POST[password]';");
        $row= mysqli_fetch_assoc($res); 
        $rowCount = mysqli_num_rows($res);
        if ($rowCount == 0)
        {
            ?>
            <script type = "text/javascript">
                alert("Incorrect Username and Password")
            </script>
            <?php

        }
            else
            {
                $_SESSION['login_user'] = $_POST['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['pic'] = $row['pic'];
               ?> 
               <script>
                   window.location="index.php"
               </script>
               <?php
            }
        }
?>

</body>
</html> 