<?php
    $db=mysqli_connect("localhost","root","","library");     //servername,username,password,databasename
    
    if(!$db)    //if there is an error during connection
    {   
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connection successfullll"    //else if there is no error
?>