<?php 

    include_once '../connectdb.php';

    session_start();

    $id = $_GET['id'];
    $refr = $_GET['refr'];
    $id_user = $_SESSION['id'];
    // เปลี่ยนสถานะเป็น Check Out
    $query = "UPDATE books
                    SET status = 'CheckOut'
                    WHERE id_bk = " . $id; 
        
    $result = mysqli_query($conn, $query);

    // เพิ่มจำนวนห้องที่เหลือ
    $query_nb = "UPDATE room_in_hotel
                    SET no_bed = no_bed+1
                    WHERE id_room = " . $refr; 
        
    $result_nb = mysqli_query($conn, $query_nb);
    
    if ($result){
        echo '<script> alert("Check Out เรียบร้อย"); </script>';
        header('Refresh:0; url = ../dashboard-list-bookings.php?act=waiting&id=' .$id_user);
    }else{
        echo '<script> alert("มีบางอย่างผิดพลาดกรุณาจองใหม่อีกครั้ง"); </script>';
        header('Refresh:0; url = ../dashboard-list-bookings.php?act=waiting&id=' .$id_user);
    }

    
// regigter end
?>