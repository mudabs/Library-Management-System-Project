<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <section class="reg_section" >
        <div class="reg_image">
            <br>
            <div class="registration_box">

                <br>
                <h2 style="color: white; padding-left: 70px;">Sign Up</h2>
                <br>
                <div class="login_form">
                    <form name="Registration" action="" method="post">
                        <input type="text" name="firstname" placeholder="First name" required = ""> <br> <br>
                        <input type="text" name="lastname" placeholder="Last name" required = ""> <br> <br>
                        <input type="text" name="username" placeholder="Username" required = ""> <br> <br>
                        <input type="email" name="email" placeholder="Email" required = ""> <br> <br>
                        <input type="password" name="password" placeholder="Password" required =""> <br> <br>
                        <input type="text" name="phone" placeholder="Phone Number" required =""> <br> <br>
<!--                    <span style="color: white;">
                            Gender<br>
                            Male<input type="radio" name="gender" required ="" style="height: 20px; width: 30px;">
                            Female<input type="radio" name="gender"  required ="" style="height: 20px; width: 30px;"> 
                        </span>
                        <br> <br>
                        <span style="color: white;">
                            Membership Type <br>
                            Admin<input type="radio" name="type" required ="" style="height: 20px; width: 30px;">
                            Memeber<input type="radio" name="type" required ="" style="height: 20px; width: 30px;"> 
                        </span>
-->
                        <br> <br>
                        <button type="submit" class="reg_button" name ="submit" >Sign Up</button>
                        <br>
                        <p style=" color:white">
                        Already have an Account? <a href="admin_login.php" class = "sign_icon">Sign In</a> 
                        </p>
                    </form>
                </div>
                
            </div>
            
        </div>
    </section>

    <?php
        if(isset($_POST['submit']))
        {
            $count = 0;  //counts the number of new usernames
            $sql="SELECT username FROM `admin`"; //works the same way as the mysqli_query method
            $res = mysqli_query($db,$sql);  //results of query above are saved
            while($row = mysqli_fetch_assoc($res))
            {
                if($row['username'] == $_POST['username']) //if username in DB = to username in textbox
                {
                    $count = $count + 1;
                }
            }
            if($count == 0)
            {
                //SQL code for inserting values
                 mysqli_query($db,"INSERT INTO `admin` VALUES ('','$_POST[firstname]', 
                '$_POST[lastname]', '$_POST[username]','$_POST[email]', '$_POST[password]', 
                '$_POST[phone]', '');");  
    ?> 
        <script type="text/javascript"> 
            alert("Registration Successful");
            window.location="admin_login.php";
        </script>       
    <?php        
        
        }
        else
        {
            ?> 
            <script type="text/javascript">
                alert("The username already exists");
            </script>       
        <?php         
        }
    }
    ?>

</body>
</html>