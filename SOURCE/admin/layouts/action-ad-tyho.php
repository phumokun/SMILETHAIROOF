<?php 

include_once '../../connectdb.php';

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// register start
if(isset($_POST['submit'])){
    $type_hotel = $_POST['type_hotel'];
    // เพิ่มข้อมูลลง Database
    $query = "INSERT INTO type_hotel (type_hotel)
                VALUE('" . $type_hotel . "')";
    $result = mysqli_query($conn, $query);
    
    if ($result){
        echo '<script> alert("เพิ่มประเภทเสร็จสิ้น"); </script>';
        header('Refresh:0; url = ../list-type-hotel.php');
    }else{
        echo '<script> alert("มีบางอย่างผิดพลาดกรุณาเพิ่มใหม่อีกครัง"); </script>';
        header('Refresh:0; url = ../list-type-hotel.php');
    }
    
}
// regigter end
?>