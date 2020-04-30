<?php 

include_once '../../connectdb.php';

session_start();

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "DELETE FROM type_hotel
              WHERE id = " . $id;
    mysqli_query($conn, $query);

    echo '<script> alert("ลบรายการนี้เสร็จสิ้น"); </script>';
    header("Location: ../list-type-hotel.php");
}
    
    
// regigter end
?>