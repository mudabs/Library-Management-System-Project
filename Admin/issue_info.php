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
            height:1000px;
            background-color:black;
            opacity:0.7;
            color:white;
        }

        .table{
            color:black;
            text-align:center;
        }

        .scrol{
          width:100%;
          height:800px;
          overflow:auto;
        }
        .form-control{
          width:300px;
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
  <a class = "h" href="request.php">Book Requests</a>
  <a class = "h" href="issue_info.php">Issue Information</a>
  <a class = "h" href="expired.php">Expired Books</a>
</div>

<div id="main">
  <p></p>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> 
  
  <div class = "container">
    <br>
  
    <h2 style = "text-align:center">Book Issue Information</h2>
    
    <?php
    $c = 0;//count variable

    if(isset($_SESSION['login_user']))
    {
      $sql="SELECT member.username,books.bid,`name`,authors,`edition`,issue,issue_book.return,approve
      FROM member
      INNER JOIN issue_book ON member.username=issue_book.username             		
      INNER JOIN books ON issue_book.bid=books.bid 
      WHERE issue_book.approve ='Yes' OR issue_book.approve ='Expired' OR issue_book.approve ='' OR issue_book.approve ='Returned'
      ORDER BY issue_book.return DESC;";
      $res = mysqli_query($db,$sql);

      echo "<div class = 'scrol'>"; // Adds a scroll bar
      echo "<table class = 'table table-bordered table-hover'>";
      ?>
        <div style = "width:500px;">
<h3>Return Book</h3>
  <form action="" method="post">
      <input type="text" name="username" placeholder="Username" required = "" class = "form-control"> <br>
      <input type="text" name="bid" placeholder="Book Id" required = "" class = "form-control"> <br>
      <button type="submit" name = "submit1" class = "btn btn-default">Return</button>
  </form>

<!-- Query to return a book-->

<?php
  if(isset($_POST['submit1'])){
    //Updates the book status and reflects returned
    $d = date("d-m-Y");
    mysqli_query($db,"UPDATE `issue_book`
    SET `approve`='Returned',`return`='$d'
    WHERE `username` = '$_POST[username]' AND `bid` = '$_POST[bid]'");

    //Updates the number of books in the library
    mysqli_query($db,"UPDATE `books`
    SET `quantity`=`quantity`+1
    WHERE `bid` = '$_POST[bid]'");
    ?>
      <script>
        alert ("Book has been Returned ");
      </script>
    <?php
  }
?>
<!-- Query to return a book-->
 </div>
      <?php
      //Table Header
        
        echo "<tr style = 'background-color: #776a6a;'>";
          echo "<th>"; echo "Username"; echo"</th>";
          echo "<th>"; echo "Book ID"; echo"</th>";
          echo "<th>"; echo "Book Name"; echo"</th>";
          echo "<th>"; echo "Authors"; echo"</th>";
          echo "<th>"; echo "Edition"; echo"</th>";
          echo "<th>"; echo "Issue Date"; echo"</th>";
          echo "<th>"; echo "Return Date"; echo"</th>";
          echo "<th>"; echo "Book Status"; echo"</th>";
        echo "</tr>";

        
        echo "<br>";
      //Table Body
      while($row=mysqli_fetch_assoc($res))
      {
        
        /*_______________Checking if book expired or not___________ */
        $d = date("d-m-y");
        if($d > $row['return'])
        {
          $c = $c+1;
          //$var = '<p style = "color:yellow; background-color:red; height:47px;">EXPIRED</p>';

          mysqli_query($db,"UPDATE issue_book SET approve = 'Expired' WHERE `return` = '$row[return]' AND approve ='Yes' LIMIT $c;");
          
        }
        
        echo "<tr style = 'background-color: white'>";
          echo "<td  >"; echo $row['username']; echo"</td>";
          echo "<td  >"; echo $row['bid']; echo"</td>";
          echo "<td  >"; echo $row['name']; echo"</td>";
          echo "<td  >"; echo $row['authors']; echo"</td>";
          echo "<td  >"; echo $row['edition']; echo"</td>";
          echo "<td  >"; echo $row['issue']; echo"</td>";
          echo "<td  >"; echo $row['return']; echo"</td>";
          if($row['approve'] == "Expired"){
            echo "<td style='background-color:red' >"; echo $row['approve']; echo"</td>";
          }
          else{
            echo "<td  >"; echo $row['approve']; echo"</td>";
          }
        echo "</tr>";
      
      }
     echo "</table>";
     echo "</div>";
    }
    else
    {
      ?>
      <h4 style = "text-align:center">Please Login to Access Book Issue Information</h4>
      <?php
    }
?> 

<br> 

 
     
 
        
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