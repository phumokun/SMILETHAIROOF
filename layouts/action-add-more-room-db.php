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
        $price_room = $_POST['price_room'];
        // $price_kid = $_POST['price_kid'];
        $num_adult = $_POST['num_adult'];
        $num_kid = $_POST['num_kid'];
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
        $picture_main = $_POST['picture_main'];

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit();

        
        $in_hotel ="INSERT INTO room_in_hotel (ref_id,
                                                name_room,
                                                price_room,
                                                num_adult,
                                                num_kid,
                                                type_bed,
                                                no_bed,
                                                detail_room,
                                                picture,
                                                option_room,
                                                facebook,
                                                instagram)
                        VALUE('" . $id . "',
                        '" . $name_room . "',
                        '" . $price_room . "',
                        '" . $num_adult . "',
                        '" . $num_kid . "',
                        '" . $type_bed . "',
                        '" . $no_bed . "',
                        '" . $detail_room . "',
                        '" . $picture_main . "',
                        '" . $option_room . "',
                        '" . $facebook . "',
                        '" . $instagram . "')";

        $result = mysqli_query($conn, $in_hotel);

        foreach($_POST['picture'] as $row=>$pic){
            $picture = $_POST['picture'][$row];

            $upmuli ="INSERT INTO uploads_multi_images (ref_host, type_bed, picture_hotel)
                        VALUE('" . $id . "', '" . $type_bed . "', '" . $picture . "')";

            $result = mysqli_query($conn, $upmuli);
            
        }

        echo '<script> alert("การเพิ่มโรงแรมเสร็จสิ้น"); </script>';
        header('Refresh:0; url = ../dashboard-listing-table.php?id=' . $id);
                
        } else {
            echo '<script> alert("มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครัง"); </script>';
            header('Refresh:0; url = ../dashboard-add-listing.php?id=' . $id);
        }

    
// regigter end
?>