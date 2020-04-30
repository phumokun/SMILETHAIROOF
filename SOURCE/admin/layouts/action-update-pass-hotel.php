<?php 

	include_once '../../connectdb.php';

	// echo '<pre>';
	// print_r ($_GET);
	// echo '</pre>';
	// exit();

	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$update = $_GET['val'];
		$query = "UPDATE users_add_hotel SET
				status_hotel = '" . $update . "'
				WHERE id_hotel = " . $id;
		$result = mysqli_query($conn, $query);
		if ($result){
			header("Location: ../list-pass-hotel.php");
		} else {
			//... error msg
		}
	}


?>
