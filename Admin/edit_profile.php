<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com.ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 400px;
            height: 500px;
            margin: 0 auto;
        }

        td{
            text-align:left;
        }

        body{
            background-color:white;
        }

        .sidebar{
            height: 100%;
            width:350px;
            background-color:rgb(202, 207, 222);
            position: fixed;
            z-index:1;
            overflow:auto;
        }

        .table{
            color:black;
        }

        main{
            margin-left: 350px;
            float:left;
            width: 76.5%;
        }

        form{
            padding-left: 200px;
            padding-right: 200px;
            margin:0 auto;
        }
    </style>
</head>

<body>
    <main>
        <h2 style = "color: #b32b42; text-align:center;">MY PROFILE</h2>
        
        <form name="Registration" action="" method="post">
            <input type="text" name="firstname" placeholder="First name" required = "" class="form-control"> <br> <br>
            <input type="text" name="lastname" placeholder="Last name" required = "" class="form-control"> <br> <br>
            <input type="text" name="username" placeholder="Username" required = "" class="form-control"> <br> <br>
            <input type="email" name="email" placeholder="Email" required = "" class="form-control"> <br> <br>
            <input type="password" name="password" placeholder="Password" required ="" class="form-control"> <br> <br>
            <input type="text" name="phone" placeholder="Phone Number" required ="" class="form-control"> <br> <br>
            <button type="submit" class = "btn btn-default">Edit</button>
        </form>

    </main>
    <section style = "width:350px; float:top;">
    <nav class = "sidebar">
            <?php
                $q = mysqli_query($db,"SELECT * FROM  admin WHERE username = 
                '$_SESSION[login_user]'")
            ?>
            <div>
                <?php
                    $row = mysqli_fetch_assoc($q);
                    echo "<div style = 'text-align:center'><img style='padding-left:0px'; src='icons/".$_SESSION['pic']."' ></div>"
                ?>
            </div>

            <div>
                <h4 style = "text-align:center; color:white">
                    <?php
                        echo $_SESSION['login_user'];
                    ?>
                </h4>
            </div>

            <div>
                <?php
                    echo "<h2 style = 'color: #b32b42;'>First_Name</h2>";
                    echo"<h4>". $row['firstname']."</h4>";
                    
                    echo "<h2 style = 'color: #b32b42;'>Last_Name</h2>";
                    echo"<h4>". $row['lastname']."</h4>";

                    echo "<h2 style = 'color: #b32b42;'>User_Name</h2>";
                    echo"<h4>". $row['username']."</h4>";
                    
                    echo "<h2 style = 'color: #b32b42;'>Email</h2>";
                    echo"<h4>". $row['email']."</h4>";

                    echo "<h2 style = 'color: #b32b42;'>Phone</h2>";
                    echo"<h4>". $row['phone']."</h4>";

                ?>
            </div>
        </nav>
    </section>
        
    
</body>