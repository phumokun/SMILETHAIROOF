<?php 

include_once '../connectdb.php';

session_start();

    // รับค่า ID จาก Parmeter ที่มากับ link
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM users
                WHERE id = " . $id;
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result); 
        
    }
        // echo '<pre>';
        // print_r($id);
        // echo '</pre>';
        // exit();

    // ฟอร์มการเปลี่ยนแปลงข้อมูลส่วนตัว
    if (isset($_POST['save_change'])) {

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit();

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $about_me = $_POST['about_me'];
        $avatar_old = $_POST['avatar_old'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];

        // set date for name img
        $date = date("Ymd_His");
        // set number random for name img
        $num_random = (mt_rand());

        $avatar_upload = (isset($_POST['avatar_upload']) ? $_POST['avatar_upload'] : '');
        // file name
        $upload = $_FILES['avatar_upload']['name'];
        
        if ($upload !='') {
            // upload where
            $path = "../images/img_users/";
            // strrchr for delete name img old 
            $type = strrchr($_FILES['avatar_upload']['name'],".");
            // create new name 
            $newname = $num_random . $date . $type;
            // copy img to folder
            $path_copy = $path . $newname;
            // upload ing name to table img_profile
            move_uploaded_file($_FILES['avatar_upload']['tmp_name'], $path_copy);
        } else {
            // ถ้าไม่มีการอัพรูปใหม่ จะใช้ชื่อไฟล์รูปเดิม
            $newname = $avatar_old;
        }

        $query = "UPDATE users
                    SET name = '" . $name . "', 
                        phone_user = '" . $phone . "',
                        address = '" . $address . "',
                        about_me = '" . $about_me . "',
                        picture_users = '" . $newname . "',
                        facebook = '" . $facebook . "',
                        twitter = '" . $twitter . "',
                        instagram = '" . $instagram . "'
                    WHERE id = " . $id; 

        // echo '<pre>';
        // print_r($query);
        // echo '</pre>';
        // exit();
        
        $result = mysqli_query($conn, $query);

        if ($result){
            echo '<script> alert("การเปลี่ยนแปลงข้อมูลเสร็จสิ้น"); </script>';
            header('Refresh:0; url = ../dashboard-myprofile.php?id=' . $id);
        }else{
            echo '<script> alert("มีบางอย่างผิดพลาดกรุณาลองใหม่อีกครัง"); </script>';
            header('Refresh:0; url = ../dashboard-add-listing.php?id=' . $id);
        }     
    }

?>