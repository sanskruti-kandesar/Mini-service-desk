<?php


// generate a unique file name 

// save the file in a uploads folder
// making a folder for each user
// if there is no folder for userID make a folder

$filename = $file['name'] . "_" .  round(microtime(true) * 1000);
$upload = $userID . '/';
$filepath = $upload . $filename;
$sucess = 1;

if(!is_dir($upload)){
    mkdir($upload);
}


$move = move_uploaded_file($file['tmp_name'], $filepath);
$sql = "INSERT INTO tickets (imagePath) VALUES ('$filepath')";
$result = mysqli_query($conn, $sql);

echo "Success";
?>