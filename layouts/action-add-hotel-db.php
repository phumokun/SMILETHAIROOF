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

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit();


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
        $detail_hotel = $_POST['detail_hotel'];
        // การแก้ Error หากผู้ใช้งานไม่ได้เลือก
        $option_hotel = "";
            if (isset($_POST['option_hotel'])) {
                $option_hotel = implode(",",$_POST['option_hotel']);
            }

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
                                                    phone_hotel,
                                                    email_hotel,
                                                    detail_hotel,
                                                    option_hotel,
                                                    status_hotel)
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
                        '" . $detail_hotel . "',
                        '" . $option_hotel . "',
                        '" . "รอการตรวจสอบ" . "')";

        $result = mysqli_query($conn, $add_hotel);

        $name_room = $_POST['name_room'];
        $price_room = $_POST['price_room'];
        $num_adult = $_POST['num_adult'];
        $num_kid = $_POST['num_kid'];
        // $price_kid = $_POST['price_kid'];
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

        $update_level = "UPDATE users SET
				userlevel = '" . "hostel" . "'
                WHERE id = " . $id;
                
        $result = mysqli_query($conn, $update_level);

        // เปลี่ยนค่าใน session
        $_SESSION['userlevel'] = "hostel";

        echo '<script> alert("การเพิ่มโรงแรมเสร็จสิ้น"); </script>';
        header('Refresh:0; url = ../dashboard-listing-table.php?id=' . $id);
                
        } else {
            echo '<script> alert("มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครัง"); </script>';
            header('Refresh:0; url = ../dashboard-add-listing.php.php?id=' . $id);
        }

    
// regigter end
?>