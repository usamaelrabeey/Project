<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

// database connection 
$conn = new mysqli('localhost','root','','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(user_name, email, password, password2) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $username, $email, $password, $password2);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}



?>