<?php 

    include_once '../connectdb.php';

    session_start();

    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    // exit();


    // รับค่า ID จาก Parmeter ที่มากับ link
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM users
                WHERE id = " . $id;
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result); 

        $id = $row["id"];
        
    }

    if(isset($_POST['submit_add_more_room'])){

        
        $name_room = $_POST['name_room'];
        $price_adult = $_POST['price_adult'];
        $price_kid = $_POST['price_kid'];
        $type_bed = $_POST['type_bed'];
        $no_bed = $_POST['no_bed'];
        $detail_room = $_POST['detail_room'];
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
        $date = date("Ymd_His");
        // set number random for name img
        $num_random = (mt_rand());

        $picture = (isset($_POST['picture']) ? $_POST['picture'] : '');
        // file name
        $upload = $_FILES['picture']['name'];
        
        if ($upload !='') {
            // upload where
            $path = "../images/city/";
            // strrchr for delete name img old 
            $type = strrchr($_FILES['picture']['name'],".");
            // create new name 
            $newname = $num_random . $date . $type;
            // copy img to folder
            $path_copy = $path . $newname;
            // upload ing name to table img_profile
            move_uploaded_file($_FILES['picture']['tmp_name'], $path_copy);
        } else {
            // ถ้าไม่มีการอัพรูปใหม่ จะใช้ชื่อไฟล์รูปเดิม
            $newname = "";
        }
        
        $in_hotel ="INSERT INTO room_in_hotel (ref_id,
                                                name_room,
                                                price_adult,
                                                price_kid,
                                                type_bed,
                                                no_bed,
                                                detail_room,
                                                picture,
                                                option_room,
                                                facebook,
                                                instagram)
                        VALUE('" . $id . "',
                        '" . $name_room . "',
                        '" . $price_adult . "',
                        '" . $price_kid . "',
                        '" . $type_bed . "',
                        '" . $no_bed . "',
                        '" . $detail_room . "',
                        '" . $newname . "',
                        '" . $option_room . "',
                        '" . $facebook . "',
                        '" . $instagram . "')";

        $result = mysqli_query($conn, $in_hotel);

        echo '<script> alert("การเพิ่มโรงแรมเสร็จสิ้น"); </script>';
        header('Refresh:0; url = ../dashboard-listing-table.php?id=' . $id);
                
        } else {
            echo '<script> alert("มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครัง"); </script>';
            header('Refresh:0; url = ../dashboard-add-listing.php?id=' . $id);
        }

    
// regigter end
?>