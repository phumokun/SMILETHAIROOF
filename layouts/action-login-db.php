<?php 

include_once '../connectdb.php';

session_start();

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

// login start
if(isset($_POST['submit_login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE
                email = '" . $email . "' AND
                password = '" . md5($password) . "'";
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['phone_user'] = $row['phone_user'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['about_me'] = $row['about_me'];
        $_SESSION['picture_users'] = $row['picture_users'];

        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
        // exit();

        header('Refresh:0; url = ../index.php');

    } else {
        echo "<script>alert('E-mail หรือ password ไม่ถูกต้อง'); </script>";
        header('Refresh:0; url = ../index.php');
    }   
}

?>