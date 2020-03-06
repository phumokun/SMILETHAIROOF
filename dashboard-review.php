<?php

    session_start();

    include('layouts/alert-please-login.php');

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];

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
                                    <?php include('layouts/menu-profile-tab-review.php'); ?> 
                                </div>
                                <!--dasboard-menu end--> 
                            </div>
                        </div>
                    </section>
                    <!-- section end-->
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
                                            <h3>Reviews</h3>
                                        </div>
                                        <div class="reviews-comments-wrap">
                                            <!-- reviews-comments-item -->  
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="images/avatar/1.jpg" alt=""> 
                                                </div>
                                                <div class="reviews-comments-item-text">
                                                    <h4><a href="#">Liza Rose</a> on <a href="listing-single.html" class="reviews-comments-item-link">Holiday Home</a></h4>
                                                    <div class="review-score-user">
                                                        <span>4.4</span>
                                                        <strong>Good</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                    <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>12 April 2018</span><a href="#"><i class="fal fa-reply"></i> Reply</a></div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end--> 
                                            <!-- reviews-comments-item -->  
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="images/avatar/1.jpg" alt=""> 
                                                </div>
                                                <div class="reviews-comments-item-text">
                                                    <h4><a href="#">Adam Koncy</a> on <a href="listing-single.html" class="reviews-comments-item-link">Premium Plaza Hotel </a></h4>
                                                    <div class="review-score-user">
                                                        <span>4.7</span>
                                                        <strong>Very Good</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                    <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>03 December 2017</span><a href="#"><i class="fal fa-reply"></i> Reply</a></div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->  
                                            <!-- reviews-comments-item -->  
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="images/avatar/1.jpg" alt=""> 
                                                </div>
                                                <div class="reviews-comments-item-text">
                                                    <h4><a href="#">Liza Rose </a>on  <a href="listing-single.html" class="reviews-comments-item-link">Park Central </a></h4>
                                                    <div class="review-score-user">
                                                        <span>4.4</span>
                                                        <strong>Good</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                    <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>12 April 2018</span><a href="#"><i class="fal fa-reply"></i> Reply</a></div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end--> 
                                            <!-- reviews-comments-item -->  
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="images/avatar/1.jpg" alt=""> 
                                                </div>
                                                <div class="reviews-comments-item-text">
                                                    <h4><a href="#">Adam Koncy</a> on  <a href="listing-single.html" class="reviews-comments-item-link">Grand Hero Palace </a></h4>
                                                    <div class="review-score-user">
                                                        <span>4.7</span>
                                                        <strong>Very Good</strong>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                    <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i>03 December 2017</span><a href="#"><i class="fal fa-reply"></i> Reply</a></div>
                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->                                                                                                                    
                                        </div>
                                    </div>
                                    <!-- pagination-->
                                    <div class="pagination">
                                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                        <a href="#">1</a>
                                        <a href="#" class="current-page">2</a>
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