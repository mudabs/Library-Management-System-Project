<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library System</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com.ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type = "text/css">
        .search{
            padding-left:800px;
        }

        .btn{
            width:100px
        }

        .container{
            height:800px;
            background-color:black;
            opacity:0.7;
            color:white;
        }

        .table{
            color:black;
            text-align:center;
        }

        .approve{
          margin-left: 320px;
          color:black; 
          width:100px;
        }

        .form-control{
          width:500px;
          margin:0px auto;
          color:black;
        }

        /*______________side bar________________*/
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
  }
  
  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    margin-top:90px;
  }
  
  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  .sidenav a:hover {
    color: #f1f1f1;
  }
  
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
  
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  
    .h:hover{
    color:white;
    width:300px;
    height:50px;
    background-color:grey;
  } 
  /*______________side bar________________*/
    </style>

</head>

<body>

    <!--_____________________sidebar_________________-->
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
  <div style = "color:white; ">
    <?php

    if(isset($_SESSION['login_user']))
    {
        echo "<img class = 'user_icon' style = 'height:100px;' src='icons/".$_SESSION['pic']."' >"; //shows person image 
        echo "<br><br>";
        echo "<span style = 'margin-left:95px'>".$_SESSION['login_user']."</span>";
    }
    ?> 
</div>        
  <a class = "h" href="books.php">Books</a>
  <a class = "h" href="request.php">Book Requests</a>
  <a class = "h" href="issue_info.php.php">Issue Information</a>
  <a class = "h" href="expired.php">Expired Books</a>
</div>

<div id="main">
  <p></p>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> 
   
  <div class = "container">
   <h3 style = "text-align:center">Approve Requests</h3>
     <form action="" method="post" >
      <input type="text" name="approve" placeholder="Yes or No" required = "" class = "form-control"> <br>
      <input type="text" name="issue" placeholder="Issue Date dd--mm-yyyy" required = "" class = "form-control"> <br>
      <input type="text" name="return" placeholder="Return Date dd-mm-yyyy" required = "" class = "form-control"> <br>
      <button type="submit" name = "submit" class = "btn btn-default">Approve</button>
      </form>
 </div>  
      
</div>
<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db, "UPDATE `issue_book` SET `approve`='$_POST[approve]',`issue`='$_POST[issue]',`return`='$_POST[return]' WHERE `username` = '$_SESSION[name]' AND `bid` = '$_SESSION[bid]';");

    mysqli_query($db,"UPDATE `books` SET `quantity`=`quantity`-1 WHERE `bid`='$_SESSION[bid]'");
    
    $res = mysqli_query($db,"SELECT `quantity` FROM `books` WHERE `bid` = '$_SESSION[bid]';");

    while($row = mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE `books` SET `status` = 'not-available' WHERE `bid` = '$_SESSION[bid]';");
      }
    }
    ?>
     <script>
       alert("Updated successfully.");
       window.location = "request.php";
     </script>
    <?php
  }
?>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  docum ent.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
 <!--_____________________sidebar_________________-->
    
 
 
</body>

</html>