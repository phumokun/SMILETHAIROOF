<?php 

    include_once '../connectdb.php';

    session_start();

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit();


    // Omise
    define('OMISE_PUBLIC_KEY', 'pkey_test_5jhwahj74cgia1vzb3v');
    define('OMISE_SECRET_KEY', 'skey_test_5jhwahj7cwztlw4eyy4');
    define('OMISE_API_VERSION', '2019-05-29');

    require dirname(__FILE__). '/omise/lib/Omise.php';
    
    $add = OmiseCharge::create(array(
        'amount' => $_POST['price']*100,
        'currency' => 'thb',
        'card' => $_POST['omiseToken']
    ));

    $name_user = $_POST['name_user'];
    $id_user = $_POST['id_user'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $type_bed = $_POST['type_bed'];
    $in = $_POST['in'];
    $out = $_POST['out'];
    $id_host = $_POST['id_host'];
    $id_hotel = $_POST['id_hotel'];
    $id_room = $_POST['id_room'];
    $price = $_POST['price'];
    $sumday = $_POST['sumday'];
    $adult = $_POST['adult'];
    $kid = $_POST['kid'];

    $query = "INSERT INTO books (ref_hotel, ref_host, ref_room, ref_user, name_user, email, phone, bkin, bkout, type_bed, adult, kid, sumday, price, payment, status_pay, status)
                VALUE('" . $id_hotel . "', 
                    '" . $id_host . "', 
                    '" . $id_room . "', 
                    '" . $id_user . "',
                    '" . $name_user . "',
                    '" . $email . "',
                    '" . $phone . "',
                    '" . $in . "', 
                    '" . $out . "' ,
                    '" . $type_bed . "' ,
                    '" . $adult . "' ,
                    '" . $kid . "' ,
                    '" . $sumday . "' ,
                    '" . $price . "' ,
                    '" . "Omise" . "' ,
                    '" . "ชำระเงินเรียบร้อย" . "',
                    '" . "waiting" . "')";
    $result_book = mysqli_query($conn, $query);

    // ลบจำนวนห้องที่เหลือ
    // $query_nb = "UPDATE room_in_hotel
    //                 SET no_bed = no_bed-1
    //                 WHERE id_room = " . $id_room; 
        
    // $result_nb = mysqli_query($conn, $query_nb);
    
    if ($result_book){
        echo '<script> alert("การจองเสร็จสมบูรณ์"); </script>';
        header('Refresh:0; url = ../dashboard-bookings.php?id=' .$id_user);
    }else{
        echo '<script> alert("มีบางอย่างผิดพลาดกรุณาจองใหม่อีกครั้ง"); </script>';
        header('Refresh:0; url = ../index.php');
    }

    
// regigter end
?>