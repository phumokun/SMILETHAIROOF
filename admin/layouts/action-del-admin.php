<?php 

include_once '../../connectdb.php';

session_start();

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "DELETE FROM users 
              WHERE id = " . $id;
    mysqli_query($conn, $query);

    echo '<script> alert("ลบไอดีนี้เสร็จสิ้น"); </script>';
    header("Location: ../form-ad-admin.php");
}
    
    
// regigter end
?>