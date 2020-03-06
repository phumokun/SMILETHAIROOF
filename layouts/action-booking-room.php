<?php 

include_once '../connectdb.php';

session_start();

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    exit();


    if(isset($_POST['submit'])){
        
        $name_user = $_POST['name_user'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $type_bed = $_POST['type_bed'];
        $bkin = $_POST['bkin'];
        $bkout = $_POST['bkout'];
        

        $query = "INSERT INTO books (ref_host, ref_room, ref_user, name, in, out, email, phone, payment, status)
                    VALUE'" . " " . "', '" . " " . "', '" . $bkin . "', '" . $bkout . "' , '" . $name_user . "', '" . $phone . "', '" . "1" . "')";
        $result = mysqli_query($conn, $query);
        
        if ($result){
            echo '<script> alert("การจองเสร็จสมบูรณ์"); </script>';
            header('Refresh:0; url = ../index.php');
        }else{
            echo '<script> alert("มีบางอย่างผิดพลาดกรุณาจองใหม่อีกครั้ง"); </script>';
            header('Refresh:0; url = ../index.php');
        }
    }
    
    
// regigter end
?>