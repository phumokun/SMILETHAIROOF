<?php 

include_once '../connectdb.php';

session_start();

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit();

    // รับค่า ID จาก Parmeter ที่มากับ link
    $id = $_GET['id'];
    $act = $_GET['act'];

    if(isset($_POST['submit_edit_room'])){

        $name_room = $_POST['name_room'];
        $price_room = $_POST['price_room'];
        // $price_kid = $_POST['price_kid'];
        $num_adult = $_POST['num_adult'];
        $num_kid = $_POST['num_kid'];
        $type_bed = $_POST['type_bed'];
        $no_bed = $_POST['no_bed'];
        $detail_room = $_POST['detail_room'];
        $picture_main = $_POST['picture_main'];
        
        // การแก้ Error หากผู้ใช้งานไม่ได้เลือก
        $option_room = "";
            if (isset($_POST['option_room'])) {
                $option_room = implode(",",$_POST['option_room']);
            }
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit();

        // set date for name img
        // $date = date("Ymd_His");
        // set number random for name img
        // $num_random = (mt_rand());

        // $picture = (isset($_POST['picture']) ? $_POST['picture'] : '');
        // file name
        // $upload = $_FILES['picture']['name'];
        
        // if ($upload !='') {
            // upload where
            // $path = "../images/city/";
            // strrchr for delete name img old 
            // $type = strrchr($_FILES['picture']['name'],".");
            // create new name 
            // $newname = $num_random . $date . $type;
            // copy img to folder
            // $path_copy = $path . $newname;
            // upload ing name to table img_profile
            // move_uploaded_file($_FILES['picture']['tmp_name'], $path_copy);
        // } else {
            // ถ้าไม่มีการอัพรูปใหม่ จะใช้ชื่อไฟล์รูปเดิม
            // $newname = $picture_old;
        // }
        
        $in_hotel ="UPDATE room_in_hotel 
                        SET name_room = '" . $name_room . "',
                            price_room = '" . $price_room . "',
                            num_adult = '" . $num_adult . "',
                            num_kid = '" . $num_kid . "',
                            type_bed = '" . $type_bed . "',
                            no_bed = '" . $no_bed . "',
                            detail_room = '" . $detail_room . "',
                            picture = '" . $picture_main . "',
                            option_room = '" . $option_room . "',
                            facebook = '" . $facebook . "',
                            instagram = '" . $instagram . "' 
                    WHERE id_room = " .$id;
        $result = mysqli_query($conn, $in_hotel);


        foreach($_POST['picture'] as $row=>$pic){
            $picture = $_POST['picture'][$row];

            $upmuli ="INSERT INTO uploads_multi_images (ref_host, type_bed, picture_hotel)
                        VALUE('" . $act . "', '" . $type_bed . "', '" . $picture . "')";

            $result = mysqli_query($conn, $upmuli);
        }


        if ($result) {
            echo '<script> alert("แก้ไขข้อมูลโรงแรมเสร็จสิ้น"); </script>';
            header('Refresh:0; url = ../dashboard-listing-table.php?id=' .$id);
                
        } else {
            echo '<script> alert("มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครัง"); </script>';
            header('Refresh:0; url = ../dashboard-add-listing.php?id=' .$id);
        }
    }

    
// regigter end
?>