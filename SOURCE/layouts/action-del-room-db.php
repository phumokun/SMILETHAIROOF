<?php 

include_once '../connectdb.php';

session_start();

// echo $_GET['id'];
// exit();

if (isset($_GET['id'])) {

    $id = $_GET['id'];


    $query = "DELETE FROM room_in_hotel 
              WHERE id_room = " . $id;
    mysqli_query($conn, $query);

    echo '<script> alert("การเพิ่มโรงแรมเสร็จสิ้น"); </script>';
    header("Location: ../dashboard-listing-table.php?id=" .$_SESSION['id']);
}
    
    
// regigter end
?>