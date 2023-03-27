<!DOCTYPE html>
<html>
<head>
	<title>Image View</title>
</head>
<body>

<?php $oldPath = $tickets[0]['imagePath'];
      $newPath = substr($oldPath,2);
      $imagePath = "http://localhost/mini-service-desk/" . $newPath;
?>
<img src="<?php echo $imagePath ?>" alt="Image">

</body>
</html>