<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com.ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type = "text/css">


        .search{
            padding-left:1000px;
        }

        .form-control{
          background-color:#3c4752;
          color:white;
        }

        .container{
          width:600px;
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
  <a class = "h" href="add.php">Add Books</a>
  <a class = "h" href="request.php">Book Request</a>
  <a class = "h" href="issue_info.php">Issue Information</a>
  <a class = "h" href="expired.php">Expired Books</a>
</div>

<div id="main">
  <p></p>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
  
  <div class = "container">
    <h2 style = "text-align:center; font-family'Lato', sans-serif;"> <b>Add New Books</b></h2>
    
    <form class = "book" action="" method="post">
      <input type="text" name="bid" class="form-control" placeholder = "Book ID">
        <br>  
      <input type="text" name="name" class="form-control" placeholder = "Book Name">
        <br>
      <input type="text" name="authors" class="form-control" placeholder = "Book Author">
      <br>
      <input type="text" name="edition" class="form-control" placeholder = "Edition">
      <br>
      <input type="text" name="status" class="form-control" placeholder = "Status">
      <br>
      <input type="text" name="quantity" class="form-control" placeholder = "Quantity">
      <br>
      <input type="text" name="department" class="form-control" placeholder = "Department">
      <br>
      <input type="submit" value="ADD" name = "submit" class = "btn btn-default" style = "background-color: #ebe5e5;">
    </form>
  </div>

<?php
  if(isset($_POST['submit']))
  {
    if(isset($_SESSION['login_user']))
    {
      mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]',
      '$_POST[status]','$_POST[quantity]','$_POST[department]');");
    ?>
    <script>
      alert ("Book Added Successfully");
    </script>
    <?php
    }
    else
    {
    ?>
  <script>
      alert ("You need to login first");
    </script>

    <?php
  }
}
  ?>
</div>



<!-- JAVASCRIPT -->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

</body>
</html>