<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com.ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

</head>
<body>
    


    <section class = "feed_sect">
        <br>
        <div class = "feed_wrapper">
            <h3 style= "text-align:center;">Drop any suggestions below:</h3>
            <form action="" method = "post" >
                <input type="text" name = "comment" placeholder = "comment..." class = "form_control" style = "width:100%; color:black;">
                <br> <br>
                <input type="submit" name="submit" value= "Comment" class = "btn btn-default" style = "width:100px; height:40px;">
            </form>

            <br>

            <div class = "scroll" style = "height:350px;">
            <?php
                if(isset($_POST['submit']))
                {
                    $sql = "INSERT INTO `comments` VALUES ('','Admin','$_POST[comment]');"; 
                    mysqli_query($db,$sql);     
                }
                $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                        $res = mysqli_query($db,$q);

                        echo "<table class= 'table table-bordered'>";
                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo "<tr>";
                                echo "<td style = 'width:200px; color:black;'>"; echo $row['username']; echo"</td>";
                                echo "<td style = 'color:black;'>"; echo $row['comment']; echo"</td>";
                            echo "</tr>";
                        }
                echo "</table>"
            ?>
        </div>
        </div>
    </section>
</body>
</html>