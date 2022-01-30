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
        
        <?php
        //assigning data in database into variables to be displayed on the form;
            $sql = "SELECT * FROM `admin` WHERE username = '$_SESSION[login_user]'";
            $result = mysqli_query($db,$sql) or die (mysql_error());

            while($row = mysqli_fetch_assoc($result))
            {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
                $phone = $row['phone'];
            }
        ?>
        <form name="Registration" action="" method="post">
            <input type="text" name="firstname" placeholder="First name" required = "" class="form-control" value = "<?php echo $firstname; ?>"> <br> <br>
            <input type="text" name="lastname" placeholder="Last name" required = "" class="form-control" value = "<?php echo $lastname; ?>"> <br> <br>
            <input type="text" name="username" placeholder="Username" required = "" class="form-control" value = "<?php echo $username;?>"> <br> <br>
            <input type="email" name="email" placeholder="Email" required = "" class="form-control" value = "<?php echo $email; ?>"> <br> <br>
            <input type="password" name="password" placeholder="Password" required ="" class="form-control" value = "<?php echo $password;?>"> <br> <br>
            <input type="text" name="phone" placeholder="Phone Number" required ="" class="form-control" value = "<?php echo $phone ;?>"> <br> <br>
            <label for="photo">Photo</label>
            <input type="file" name="photo" accept = "image/*">
            <input type="submit"class = "btn btn-default" name = "submit" value="Save">
            
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                
                $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
                $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
                $username = mysqli_real_escape_string($db,$_POST['username']);
                $email = mysqli_real_escape_string($db,$_POST['email']);
                $password = mysqli_real_escape_string($db,$_POST['password']);
                $phone = mysqli_real_escape_string($db,$_POST['phone']);
                    $photo_name = $_FILES['photo']['name'];
                    $photo_tmp_name = $_FILES['photo']['tmp_name'];
                    $photo_new_name = rand().$photo_name;
                    
                    

                $sql1 = "UPDATE `admin` SET `firstname` = '$firstname', 
                `lastname` = '$lastname', `username` = '$username', 
                `email` = '$email',`password` = '$password', `phone` = '$phone', `pic` = '$photo_new_name'
                WHERE `username` = '{$_SESSION['login_user']}';";
                $result=mysqli_query($db,$sql1);
                
                if($result)
                {
                    move_uploaded_file($photo_tmp_name,"image/".$photo_new_name);
                   echo "<pre>";
                    print_r($_FILES);
                    echo "<pre>";
                   ?>
                        <script>
                            alert("Saved Successfully");
                        </script>
                    <?php
                }
                else
                {
                    ?>
                    <script>
                        alert("Something went wrong");
                    </script>
                    <?php
                }
        }
        ?>
        

    </main>
    <section style = "width:350px; float:top;">
    <nav class = "sidebar">
            <?php
                $q = mysqli_query($db,"SELECT * FROM `admin` WHERE username = 
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