<?php 

    include_once '../connectdb.php';

    session_start();

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit();

    $id = $_GET['id'];
    $id_user = $_SESSION['id'];

    $comment_t = $_POST['comment_t'];
    $sc_cl = $_POST['rgcl'][0];
    $sc_es = $_POST['rgcl'][1];
    $sc_st = $_POST['rgcl'][2];
    $sc_fa = $_POST['rgcl'][3];
    $rg_total = $_POST['rg_total'];

    $query = "INSERT INTO review_hotels (ref_hotel, ref_user, comment_ho, score_cl, score_es, score_st, score_fa, score_to)
                VALUE('" . $id . "', '" . $id_user . "', '" . $comment_t . "',  '" . $sc_cl . "', '" . $sc_es . "', '" . $sc_st . "', '" . $sc_fa . "', '" . $rg_total . "')";
    $result = mysqli_query($conn, $query);
    
    if ($result){
        echo '<script> alert("เพิ่มรีวิวเสร็จสิ้น"); </script>';
        header('Refresh:0; url = ../listing-single.php?id=' . $id);
    }else{
        echo '<script> alert("มีบางอย่างผิดพลาดกรุณาสมัครใหม่อีกครัง"); </script>';
        header('Refresh:0; url = ../listing-single.php?id=' . $id);
    }

    
// regigter end
?>