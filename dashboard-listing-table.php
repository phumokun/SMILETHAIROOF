<?php

    session_start();

    include_once 'connectdb.php';
    
    include('layouts/alert-please-login.php');                                  


?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Easybook - Hotel Booking Directory Listing Template</title>
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
                                    <?php include('layouts/menu-profile-tab-listing.php'); ?> 
                                </div>
                                <!--dasboard-menu end-->
                                <!--Tariff Plan menu-->
                                <!-- <div   class="tfp-btn"><span>Tariff Plan : </span> <strong>Extended</strong></div>
                                <div class="tfp-det">
                                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                                    <a href="#" class="tfp-det-btn color2-bg">Details</a>
                                </div> -->
                                <!--Tariff Plan menu end-->
                            </div>
                        </div>
                    </section>
                    <!-- section end-->
                    <!-- section-->
                    <section class="middle-padding">
                        <div class="container">
                            <!--dasboard-wrap-->
                            <div class="dasboard-wrap fl-wrap">
                                <!-- dashboard-content--> 
                                <div class="dashboard-content fl-wrap">
                                    <div class="dashboard-list-box fl-wrap">
                                        <div class="dashboard-header fl-wrap">
                                            <h3>ที่พักของท่าน</h3>
                                        </div>

                                        <?php

                                            // รับค่า Parameter จาก link เพื่อทำการ Select ข้อมูล
                                           
                                                $id = $_SESSION['id'];
                                                $query = "SELECT * FROM users_add_hotel as addho 
                                                                    RIGHT JOIN room_in_hotel as inho ON inho.ref_id = addho.ref_id
                                                                    -- สร้าง WHERE เพื่อให้ Fetch ข้อมูลเฉพาะของ id นั้น ๆ 
                                                                WHERE inho.ref_id = $id AND addho.ref_id = $id";
 
                                                // echo $query;
                                                // exit();

                                                // echo '<pre>';
                                                // print_r($row);
                                                // echo '</pre>';
                                                // exit();

                                                // ใช้คำสั่ง While ในการ Query ข้อมูลทั้งหมดของ Id นั้น ๆ
                                                if ($result = mysqli_query($conn, $query)) {
                                                    while ($row = mysqli_fetch_array($result)) {

                                        ?>

                                        <!-- dashboard-list  -->    
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item">New</span>
                                                <div class="dashboard-listing-table-image">
                                                    <a><img src="images/images_hotel_users/<?php echo $row['picture']; ?>" alt=""></a>
                                                </div>
                                                <div class="dashboard-listing-table-text">
                                                        
                                                    <!-- ส่งค่า Parameter ไปหน้า listing_single เพื่อใช้คำสั่ง GET -->
                                                    <h4><a><?php echo $row['name_room']; ?></a></h4>
                                                    
                                                    <span class="dashboard-listing-table-address"><i class="far fa-map-marker"></i>
                                                        <a><?php echo $row['no_bed']; ?> ห้อง</a></span><br>

                                                    <span class="dashboard-listing-table-address"><i class="far fa-map-marker"></i>
                                                        <a><?php echo $row['type_bed']; ?></a></span><br>
                                                    
                                                    <span class="dashboard-listing-table-address"  style="margin-bottom: 10px;"><i class="far fa-map-marker"></i>
                                                        <!-- <a  href="#"> -->
                                                        <a><?php echo "ต.",$row['sub_area']," อ.",$row['area']," ",$row['province']; ?></a></span>
                                                    
                                                    <ul class="dashboard-listing-table-opt  fl-wrap">
                                                        <!-- ตวจสอบสถานะว่าโรงแรมได้รับอนุมัตแล้วหรือยัง -->
                                                        <?php if ($row['status_hotel'] === "รอการตรวจสอบ") { ?>
                                                            <li><a class="edit-btn"><?php echo $row['status_hotel']; ?><i class="fal fa-edit"></i></a></li>
                                                        <?php } else { ?>
                                                            <li><a href="dashboard-add-listing.php?id=<?php echo $row['id_room']; ?>&act=edit" class="edit-btn">แก้ไขข้อมูลห้องพัก<i class="fal fa-edit"></i></a></li>
                                                        <?php } ?>
                                                        <li><a href="layouts/action-del-room-db.php?id=<?php echo $row['id_room']; ?>" class="del-btn">ลบห้องพัก<i class="fal fa-trash-alt"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                                    }
                                                }
                                        ?>
                                        
                                        <!-- dashboard-list end-->                                                                                       
                                    </div>

                                    <div class="profile-edit-container" style="margin-top: 25px;">
                                        <div class="custom-form">
                                            <!-- เพิ่มปุุ่มห้องพัก -->
                                            <div class="hotel-facts fl-wrap">
                                                <span class="add-button color-bg" style="float:none;font-size:13px">
                                                <a href="dashboard-add-listing.php?id=<?php echo $_SESSION['id']; ?>&act=add_more" style="color:#FFFFFF">เพิ่มที่พัก</a></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pagination-->
                                    <div class="pagination">
                                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                        <a href="#" class="current-page">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                    </div>
                                </div>
                                <!-- dashboard-list-box end--> 
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
                    
            <!--register form -->
            <div class="main-register-wrap modal">
                <div class="reg-overlay"></div>
                <?php include('layouts/register-signup.php'); ?>
            </div>
            <!--register form end -->
            
            <a class="to-top"><i class="fas fa-caret-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm7W3cZP4QiIDR3WxbIoAEhrM6o2GzU2g&libraries=places&callback=initAutocomplete"></script>         
    </body>
</html>