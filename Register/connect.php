<?php
# 2 ways to connect mysql database connection
 // MySqli & PDO

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = 'mini service desk';
    
// create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
        die("SORRY WE FAILED TO CONNECT: " . mysqli_connect_error());
    }
?>