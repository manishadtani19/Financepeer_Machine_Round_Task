<?php 

// include 'config.php';

error_reporting(0);

session_start();
header("Cache-Control", "no-cache, no-store, must-revalidate");
$conn = mysqli_connect("localhost","root","");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_select_db($conn,"financepeer");
$entry = 1;

// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
// }

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

    $check = "select * from users WHERE email='$email'";
	$res = $conn->query($check);

	$row = mysqli_fetch_row($res);
	if (mysqli_num_rows($res) > 0)
	{
		$entry = 0;
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('User Already Exists!!Login to Shop')
				window.location.href='index.php'
				</SCRIPT>");
	}

    if(strlen($password)<8){
        $entry = 0;
        echo "<script>window.alert('Password - Atleast 8 characters!!')
              window.location.href='register.php'</script>";
    }

    if($entry==1)
	{
	    $sql="insert into users(username, email, password) values ('$username','$email','$password')";
		// $sql1="insert into products(phoneno) values ('$phone')";
		if (mysqli_query($conn, $sql))
		{
            $_SESSION['username'] = $row['username'];
			echo "<script>window.alert('Record created successfully')
					 window.location.href='index.php?login=1 & username=$name'</script>";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	// if ($password == $cpassword) {
	// 	$sql = "SELECT * FROM users WHERE email='$email'";
	// 	$result = mysqli_query($conn, $sql);
	// 	if (!$result->num_rows > 0) {
	// 		$sql = "INSERT INTO users (username, email, password)
	// 				VALUES ('$username', '$email', '$password')";
	// 		$result = mysqli_query($conn, $sql);
	// 		if ($result) {
	// 			echo "<script>alert('Wow! User Registration Completed.')</script>";
	// 			$username = "";
	// 			$email = "";
	// 			$_POST['password'] = "";
	// 			$_POST['cpassword'] = "";
	// 		} else {
	// 			echo "<script>alert('Woops! Something Wrong Went.')</script>";
	// 		}
	// 	} else {
	// 		echo "<script>alert('Woops! Email Already Exists.')</script>";
	// 	}
		
	// } else {
	// 	echo "<script>alert('Password Not Matched.')</script>";
	// }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Registeration Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
            </div>
            <!-- <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" required>
			</div> -->
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>