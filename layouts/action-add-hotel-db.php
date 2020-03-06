<?php 

include_once '../connectdb.php';

session_start();

    // echo '<pre>';
    // print_r($_POST);
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

    if(isset($_POST['submit_add_hotel'])){

        $name_hotel = $_POST['name_hotel'];
        $type_hotel = $_POST['type_hotel'];
        $hotel_number = $_POST['hotel_number'];
        $land = $_POST['land'];
        $village_no = $_POST['village_no'];
        $sub_area = $_POST['sub_area'];
        $area = $_POST['area'];
        $province = $_POST['province'];
        $postal_code = $_POST['postal_code'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
        $detail_hotel = $_POST['detail_hotel'];
        // การแก้ Error หากผู้ใช้งานไม่ได้เลือก
        $option_hotel = "";
            if (isset($_POST['option_hotel'])) {
                $option_hotel = implode(",",$_POST['option_hotel']);
            }
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


        // LIMIT 1 for check user 
        $add_hotel ="INSERT INTO users_add_hotel (ref_id,
                                                    name_hotel,
                                                    type_hotel,
                                                    hotel_number,
                                                    land,
                                                    village_no,
                                                    sub_area,
                                                    area,
                                                    province,
                                                    postal_code,
                                                    phone,
                                                    email,
                                                    longitude,
                                                    latitude,
                                                    detail_hotel,
                                                    option_hotel)
                        VALUE('" . $id . "',
                        '" . $name_hotel . "',
                        '" . $type_hotel . "',
                        '" . $hotel_number . "',
                        '" . $land . "',
                        '" . $village_no . "',
                        '" . $sub_area . "',
                        '" . $area . "',
                        '" . $province . "',
                        '" . $postal_code . "',
                        '" . $phone . "',
                        '" . $email . "',
                        '" . $longitude . "',
                        '" . $latitude . "',
                        '" . $detail_hotel . "',
                        '" . $option_hotel . "')";

        $result = mysqli_query($conn, $add_hotel);

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

        $update_level = "UPDATE users SET
				userlevel = '" . "admin" . "'
                WHERE id = " . $id;
                
        $result = mysqli_query($conn, $update_level);

        echo '<script> alert("การเพิ่มโรงแรมเสร็จสิ้น"); </script>';
        header('Refresh:0; url = ../dashboard-listing-table.php?id=' . $id);
                
        } else {
            echo '<script> alert("มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครัง"); </script>';
            header('Refresh:0; url = ../dashboard-add-listing.php.php?id=' . $id);
        }

    
// regigter end
?>