<?php 

include_once '../connectdb.php';

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// register start
if(isset($_POST['submit_register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // LIMIT 1 for check user 
    $user_check ="SELECT * FROM users WHERE 
                    email = '" . $email . "' LIMIT 1";

    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    // ถ้า Email นี้ถูกใช้ไปแล้วจะแจ้งเตือน
    if ($user['email'] === $email){
        echo "<script>alert('E-Mail already exists'); </script>";
        header('Refresh:0; url = ../index.php');
    }  else {

        // เพิ่มข้อมูลลง Database
        $query = "INSERT INTO users (name, email, password, picture_users, userlevel)
                    VALUE('" . $name . "', '" . $email . "', '" . md5($password) . "',  '" . "avatar.png" . "','" . "member" . "')";
        $result = mysqli_query($conn, $query);
        
        if ($result){
            echo '<script> alert("สมัครสมาชิกเสร็จสมบูรณ์ ยินดีต้อนรับ"); </script>';
            header('Refresh:0; url = ../index.php');
        }else{
            echo '<script> alert("มีบางอย่างผิดพลาดกรุณาสมัครใหม่อีกครัง"); </script>';
            header('Refresh:0; url = ../index.php');
        }
    }
}
// regigter end
?>