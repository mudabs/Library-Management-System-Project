<?php
include "navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src = "https://ajax.googleapis.com.ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type = "text/css">
        .search{
            padding-left:1000px;
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
      if(isset($_SESSION)){
        echo "<img class = 'user_icon' style = 'height:100px;' src='icons/".$_SESSION['pic']."' >"; //shows person image 
        echo "<br><br>";
        echo "<span style = 'padding-left:95px';>".$_SESSION['login_user']."</span>";
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
        <!-- _____________searchbar_____________ -->

    <div class = "search">
        <form class = "navbar-form" method = "post" name="form1">
                <input class = "form-control" type="text" name = "search"
                 placeholder = "search..." required="">
                <button style = "background-color:rgb(0, 133, 255);" type = "submit" 
                name = "submit" class="btn btn-default">
                    <span class = "glyphicon glyphicon-search"></span>
                </button>
        </form>
    </div>

    <!-- _____________searchbar_____________ -->

        <section>
           <h2 >List Of Members</h2>

           <!-- serach query -->
        <?php
            if(isset($_POST['submit']))
            {
                $q=mysqli_query($db, "SELECT * FROM `member` WHERE firstname like '%$_POST[search]%'");
                if(mysqli_num_rows($q)==0)
                {
                    echo"Sorry! Noone by that name found";
                }
                else
                {
                    echo "<table class = 'table table-bordered table-hover'>";
                        echo "<tr style = 'background-color: #776a6a;'>";
                            echo "<th>"; echo "Firstname"; echo"</th>";
                            echo "<th>"; echo "Lastname"; echo"</th>";
                            echo "<th>"; echo "Username"; echo"</th>";
                            echo "<th>"; echo "Email"; echo"</th>";
                            echo "<th>"; echo "Phone"; echo"</th>";
                         echo "</tr>";

                    while($row=mysqli_fetch_assoc($q))
                    {
                        echo "<tr style = 'background-color: white'>";
                            echo "<td  >"; echo $row['firstname']; echo"</td>";
                            echo "<td  >"; echo $row['lastname']; echo"</td>";
                            echo "<td  >"; echo $row['username']; echo"</td>";
                            echo "<td  >"; echo $row['email']; echo"</td>";
                            echo "<td  >"; echo $row['phone']; echo"</td>";
                        echo "</tr>";
                    }
                    
                }  
            }
            /*if button isn't clicked*/
            else
                {
                    $res = mysqli_query($db,"SELECT `firstname`, `lastname`, `username`, `email`, `phone` FROM `member`;");
                    echo "<table class = 'table table-bordered table-hover'>";
                        echo "<tr style = 'background-color: #776a6a;'>";
                            echo "<th>"; echo "Firstname"; echo"</th>";
                            echo "<th>"; echo "Lastname"; echo"</th>";
                            echo "<th>"; echo "Username"; echo"</th>";
                            echo "<th>"; echo "Email"; echo"</th>";
                            echo "<th>"; echo "Phone"; echo"</th>";
                        echo "</tr>";

                    while($row=mysqli_fetch_assoc($res))
                    {
                        echo "<tr style = 'background-color: white'>";
                            echo "<td  >"; echo $row['firstname']; echo"</td>";
                            echo "<td  >"; echo $row['lastname']; echo"</td>";
                            echo "<td  >"; echo $row['username']; echo"</td>";
                            echo "<td  >"; echo $row['email']; echo"</td>";
                            echo "<td  >"; echo $row['phone']; echo"</td>";
                        echo "</tr>";
                    }
                 echo "</table>";
                }
        ?>
            
           
        </section>
        
    </div>
</div>

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
 <!--_____________________sidebar_________________-->

        
    
    
</body>

</html>