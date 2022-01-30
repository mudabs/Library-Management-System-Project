<?php
    include "navigation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <style>
        body{
            height: 100%;
            background-image: url("images/librarian-scaled.jpg");
            background-size: cover;
        }

        .wrapper{
            width:400px;
            height:400px;
            margin:100px auto;
            background-color:black;
            opacity: 0.8;
            color:white;
        }

        .form-control{
            width: 300px;
            margin:0px auto;
        }

        .btn{
            margin-left:50px;
        }
    </style>
</head>
<body>
    <div class = "wrapper">
        <div style = "text-align:center;">
            <h1 style = "text-align: center; font-size:35px; font-family: Lucia Console;">
                Change Your Password
            </h1>
        </div>
        
        <form action="" method="post">
            <input type="text" name="username" class="form-control" 
            placeholder = "Username" required =""> <br>

            <input type="text" name="email" class="form-control" 
            placeholder = "Email" required =""> <br>

            <input type="text" name="password" class="form-control" 
            placeholder = "New Password" required =""> <br> 

            <button class = "btn btn-default" type = "submit" name = "submit">Update</button>
        </form>
    </div>
    <?php
        if(isset($_POST['submit']))
        {
            if(mysqli_query($db, "UPDATE admin SET password = '$_POST[password]' WHERE 
            username = '$_POST[username]' AND email = '$_POST[email]';"))
            {
                ?>
                <script>
                    alert("The Password was Updated Successfully");
                    window.location = "admin_login.php";
                </script>
                <?php
            }
        }
    ?>
</body>
</html>