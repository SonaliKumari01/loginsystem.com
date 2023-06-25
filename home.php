<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shourtcut icon" type="image/png" href="image.png">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['user_type']; ?></h1><br>
	 <a href="customer.php">User Data</a><br>
	 <a href="admin.php">Admin Pannel</a><br>
	 <a href="logout.php">Sign out</a>
	 
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>