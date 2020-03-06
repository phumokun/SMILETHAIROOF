<?php 

include_once '../connectdb.php';

session_start();

// echo $_GET['id'];
// exit();

if (isset($_GET['id'])) {

    $user_id = $_SESSION['id'];

    $query = "DELETE FROM room_in_hotel 
              WHERE id = " . $_GET['id'];
    mysqli_query($conn, $query);

    echo '<script> alert("การเพิ่มโรงแรมเสร็จสิ้น"); </script>';
    header("Location: ../dashboard-listing-table.php?id=" .$user_id);
}
    
    
// regigter end
?>