<?php
	//start using session
	session_start();

	//connect with database
	include_once '../../connectdb.php';

	// echo '<pre>';
	// print_r($row);
	// echo '</pre>';
	// exit();

	if (isset($_POST['login'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];

		//sql command
		$query = "SELECT * FROM users WHERE 
					email ='" . $email . "' AND 
					password ='" . md5($password) . "'";
		//execute sql command
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);

		$_SESSION['id'] = $row['id'];
		$_SESSION['admin_name'] = $row['name'];
		$_SESSION['email'] = $row['email'];

		//store name in php session
		
		//check whether there is result from table
		if ($row['userlevel'] === "admin") {
			echo '<script> alert("เข้าสู่ระบบจองที่พัก"); </script>';
			header("location: ../list-waiting-hotel.php");

		} else {
			echo '<script> alert("E-mial หรือ Password ผิดพลาด กรุณา Login ใหม่อีกครั้ง"); </script>';
			header('Refresh:0; url = ../admin-login.php');
		}
	} 

        

	//check if form is submitted
	
?>