<?php 

    include_once '../connectdb.php';

    session_start();

    $id = $_GET['id'];
    $id_user = $_SESSION['id'];
    // เปลี่ยนสถานะเป็น Check In
    $query = "UPDATE books
                    SET status = 'CheckIn'
                    WHERE id_bk = " . $id; 
        
    $result = mysqli_query($conn, $query);
    
    if ($result){
        echo '<script> alert("Check In เรียบร้อย"); </script>';
        header('Refresh:0; url = ../dashboard-list-bookings.php?act=waiting&id=' .$id_user);
    }else{
        echo '<script> alert("มีบางอย่างผิดพลาดกรุณาจองใหม่อีกครั้ง"); </script>';
        header('Refresh:0; url = ../dashboard-list-bookings.php?act=waiting&id=' .$id_user);
    }

    
// regigter end
?>