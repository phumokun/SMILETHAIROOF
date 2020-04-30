<?php 

include_once '../connectdb.php';

session_start();

    // รับค่า ID จาก Parmeter ที่มากับ link
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM users
                WHERE id = " . $id;
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result); 
        
    }
        // echo '<pre>';
        // print_r($_GET['$id']);
        // echo '</pre>';
        // exit();

    // ฟอร์มเปลี่ยน Password โดยเช็คจากรหัสเก่า
    if (isset($_POST['change_password'])) {

        $current_password = md5($_POST['current_password']);
        $password = $_POST['password'];
        $con_password = $_POST['con_password'];

        if ($row['password'] != $current_password) {
            
            echo '<script> alert("กรุณากรอกรหัสผ่านเดิมให้ถูกต้อง"); </script>';
            header('Refresh:0;');

        } else {
                
            $query = "UPDATE users 
                SET password = '" . md5($password) . "'
                WHERE id = '" . $id . "' ";  

            $result = mysqli_query($conn, $query);

            if ($result){
                echo '<script> alert("การเปลี่ยนรหัสผ่านเสร็จสมบูรณ์"); </script>';
                header('Refresh:0; url = ../dashboard-myprofile.php?id=' . $id);
            }else{
                echo '<script> alert("มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครัง"); </script>';
                header('Refresh:0; url = ../dashboard-myprofile.php?id=' . $id);
            }
                    
        // echo '<pre>';
        // print_r($query);
        // echo '</pre>';
        // exit();
        }      
    }

?>