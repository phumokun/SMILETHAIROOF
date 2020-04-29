<?php

    session_start();

    include_once 'connectdb.php';

    include('layouts/alert-please-login.php');

    // $header_search = explode( " - ",$_POST['header-search']);

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    // exit();

    // if (isset($_GET['search'])) {
        
    //     $lacation = $_GET['lacation'];
    //     $in_out = $_GET['header-search'];
    //     $sum_room = $_GET['sum_room'];
    //     $adult = $_GET['adult'];
    //     $kid = $_GET['kid']; 

    //     $query = "SELECT * FROM users_add_hotel 
    //                 WHERE keyword  
    //                 LIKE '%$lacation%'";
                    
    //     $result = mysqli_query($conn, $query);
    //     $row = mysqli_fetch_array($result); 

    //     // echo '<pre>';
    //     // print_r($row);
    //     // echo '</pre>';
    //     // exit();
        
    // }

    // $query = "SELECT * FROM users_add_hotel as addho 
    //             INNER JOIN room_in_hotel as inho ON inho.ref_id = addho.ref_id
    //             INNER JOIN users as us ON us.id = addho.ref_id 
    //             WHERE addho.keyword LIKE '%หาดใหญ่%'
    //             GROUP BY addho.ref_id";


    // $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_array($result);

    // echo $query;
    // exit()

?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>ค้นหาที่พัก : SMTR</title>
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
                    <!-- Map -->
                    <!-- <div class="map-container  fw-map big_map hid-mob-map">
                        <div id="map-main"></div>
                        <ul class="mapnavigation">
                            <li><a href="#" class="prevmap-nav">Prev</a></li>
                            <li><a href="#" class="nextmap-nav">Next</a></li>
                        </ul>
                        <div class="map-close"><i class="fas fa-times"></i></div>
                        <input id="pac-input" class="controls fl-wrap controls-mapwn" type="text" placeholder="What Nearby ?">
                    </div> -->
                    <!-- Map end -->
                    <!-- <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Listing </a><span>Fullwidth Map</span></div>
                        </div>
                    </div> -->
                    <section class="grey-blue-bg small-padding">
                        <div class="container">
                            <div class="row">
                                <!--filter sidebar -->
                                    <?php include('layouts/search-sidebar.php'); ?>
                                <!--listing -->
                                <div class="col-md-8">
                                    <!--col-list-wrap -->
                                    <div class="col-list-wrap fw-col-list-wrap post-container">
                                        
                                    <?php 
                    
                                        $act = isset($_GET['act']) ? $_GET['act'] : '';

                                        if ($act == 'search') {
                                            include('layouts/action-search-header.php');
                                        } else {
                                            include('layouts/action-see-all-room.php');
                                        } 
                                    
                                    ?>

                                        <!-- list-main-wrap end-->
                                    </div>
                                    <!--col-list-wrap end -->
                                </div>
                                <!--listing  end-->
                            </div>
                            <!--row end-->
                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </section>
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
                <?php include('layouts/register-signup.php'); ?>    
            <!--register form end -->
            <a class="to-top"><i class="fas fa-caret-up"></i></a>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm7W3cZP4QiIDR3WxbIoAEhrM6o2GzU2g&libraries=places&callback=initAutocomplete"></script> 
        <script type="text/javascript" src="js/mapplugins.js"></script>  
        <script type="text/javascript" src="js/maps.js"></script>        
    </body>
</html>