<?php

    session_start();
    
    // โค้ดป้องหันการเข้าไปหน้าอื่น
    include('layouts/alert-please-login.php');

    include_once 'connectdb.php';

    // รับค่า Parameter จาก link เพื่อทำการ Select ข้อมูล
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM users
				WHERE id = " . $id;
		$result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        
        $userlevel = $row['userlevel'];

        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
        // exit();

        // อัพเดทค่าใน Session เมื่อมีการเปลี่ยนรูปภาพ
        $_SESSION['picture_users'] = $row['picture_users'];
  
    }  
?>


<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>My Profile : STR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="css/reset.css">
        <link type="text/css" rel="stylesheet" href="css/plugins.css">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/color.css">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin">
                <div class="pulse"></div>
            </div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            <!-- header-->
                <?php include('layouts/header.php'); ?>
            <!--  header end -->
            <!--  wrapper  -->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!-- section-->
                    <section class="flat-header color-bg adm-header">
                        <div class="wave-bg wave-bg2"></div>
                        <div class="container">
                            <div class="dasboard-wrap fl-wrap">
                                <div class="dasboard-breadcrumbs breadcrumbs">
                                    <?php include('layouts/top-sidebar-dashboard.php'); ?>   
                                <!--dasboard-sidebar-->
                                    <?php include('layouts/sidebar-dashboard.php'); ?>
                                <!--dasboard-sidebar end--> 
                                <!-- dasboard-menu-->
                                <div class="dasboard-menu">
                                    <div class="dasboard-menu-btn color3-bg">Dashboard Menu <i class="fal fa-bars"></i></div>
                                    <?php include('layouts/menu-profile-tab-profile.php'); ?> 
                                </div>
                                <!--dasboard-menu end-->
                            </div>
                        </div>
                    </section>
                    <!-- section end-->
                    <!-- section-->
                    <section class="middle-padding">
                        <div class="container">
                            <!--dasboard-wrap-->
                            <!-- dashboard-content--> 
                            <div class="dashboard-content fl-wrap">
                                
                                <?php 
                                    // การรับค่า Paremeter เพื่อ Include ไฟล์
                                    $act = isset($_GET['act']) ? $_GET['act'] : '';

                                    if ($act == 'profile') {
                                        include('dashboard-myprofile-edit.php');
                                    } elseif ($act == 'change_password'){
                                        include('dashboard-password.php');
                                    } else {
                                        include('dashboard-myprofile-edit.php');
                                    }
                                ?>
                                                    
                            </div>
                            <!-- dasboard-wrap end-->
                        </div>
                    </section>
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!-- content end-->
            </div>
            <!--wrapper end -->

            <!--footer -->
            <footer class="main-footer">
                <!--footer-inner-->
                    <?php include('layouts/footer-inner.php'); ?>
                <!--footer-inner end -->
                <div class="footer-bg">
                </div>
                <!--sub-footer-->
                    <?php include('layouts/sub-footer.php'); ?>
                <!--sub-footer end -->
            </footer>
            <!--footer end -->
            
            <a class="to-top"><i class="fas fa-caret-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm7W3cZP4QiIDR3WxbIoAEhrM6o2GzU2g&libraries=places&callback=initAutocomplete"></script>
        <!-- Script สำหรับ Check Password -->
        <script type="text/javascript" src="js/check-password.js"></script>    
    </body>
</html>