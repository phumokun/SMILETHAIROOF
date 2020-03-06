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
        <title>Dashboard : STR</title>
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
                                <div class="dasboard-breadcrumbs breadcrumbs"><a href="#">Home</a><a href="#">Dashboard</a><span>Profile page</span></div>
                                <!--dasboard-sidebar-->
                                    <?php include('layouts/sidebar-dashboard.php'); ?>
                                <!--dasboard-sidebar end--> 
                                <!-- dasboard-menu-->
                                <div class="dasboard-menu">
                                    <div class="dasboard-menu-btn color3-bg">Dashboard Menu <i class="fal fa-bars"></i></div>
                                    <?php include('layouts/menu-profile-tab-profile.php'); ?>
                                </div>
                                <!--dasboard-menu end-->
                                <!--Tariff Plan menu-->
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
                                    <div class="box-widget-item-header">
                                        <h3> Your Stats</h3>
                                    </div>
                                    <!-- chart-wra-->           
                                    <div class="chart-wrap dashboard-item fl-wrap">
                                        <div class="chart-header fl-wrap">
                                            <div class="listsearch-input-item">
                                                <select data-placeholder="Week" class="chosen-select no-search-select" >
                                                    <option>Week</option>
                                                    <option>Month</option>
                                                    <option>Year</option>
                                                </select>
                                            </div>
                                            <div id="myChartLegend"></div>
                                        </div>
                                        <canvas id="canvas-chart"></canvas>
                                    </div>
                                    <!--chart-wra end--> 
                                    <!-- dashboard-list-box--> 
                                    <div class="dashboard-list-box fl-wrap activities mat-top">
                                        <div class="dashboard-header fl-wrap">
                                            <h3>Recent Activities</h3>
                                        </div>
                                        <!-- dashboard-list end-->    
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                                <div class="dashboard-message-text">
                                                    <p><i class="far fa-check"></i> Your listing <a href="#">Park Central</a> has been approved! </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->    
                                        <!-- dashboard-list end-->    
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                                <div class="dashboard-message-text">
                                                    <p><i class="far fa-heart"></i>Someone bookmarked your <a href="#">Holiday Home</a> listing!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->                                           
                                        <!-- dashboard-list end-->    
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                                <div class="dashboard-message-text">
                                                    <p><i class="fal fa-comments-alt"></i> Someone left a review on <a href="#">Park Central</a> listing!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->                                           
                                        <!-- dashboard-list end-->    
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                                <div class="dashboard-message-text">
                                                    <p><i class="far fa-check"></i> Your listing <a href="#">Holiday Home</a> has been approved! </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->    
                                        <!-- dashboard-list end-->    
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                                <div class="dashboard-message-text">
                                                    <p><i class="far fa-heart"></i>Someone bookmarked your <a href="#">Moonlight Hotel</a> listing!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->                                           
                                        <!-- dashboard-list end-->    
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fal fa-times"></i></span>
                                                <div class="dashboard-message-text">
                                                    <p><i class="fal fa-comments-alt"></i> Someone left a review on <a href="#">Grand Hero Palace</a> listing!</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end--> 
                                    </div>
                                    <!-- dashboard-list-box end--> 
                                </div>
                                <!-- dashboard-list-box end--> 
                            </div>
                            <!-- dasboard-wrap end-->
                        </div>
                    </section>
                    <!-- section end-->
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!-- content end-->
            </div>
            <!--wrapper end -->
            <!--footer -->
            <footer class="main-footer">
                <!--subscribe-wrap-->
                <!--subscribe-wrap end -->
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
                <div class="main-register-holder">
                    <div class="main-register fl-wrap">
                        <div class="close-reg color-bg"><i class="fal fa-times"></i></div>
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                            <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                        </ul>
                        <!--tabs -->                       
                        <div id="tabs-container">
                            <div class="tab">
                                <!--tab -->
                                <div id="tab-1" class="tab-content">
                                    <h3>Sign In <span>Easy<strong>Book</strong></span></h3>
                                    <div class="custom-form">
                                        <form method="post"  name="registerform">
                                            <label>Username or Email Address <span>*</span> </label>
                                            <input name="email" type="text"   onClick="this.select()" value="">
                                            <label >Password <span>*</span> </label>
                                            <input name="password" type="password"   onClick="this.select()" value="" >
                                            <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
                                            <div class="clearfix"></div>
                                            <div class="filter-tags">
                                                <input id="check-a" type="checkbox" name="check">
                                                <label for="check-a">Remember me</label>
                                            </div>
                                        </form>
                                        <div class="lost_password">
                                            <a href="#">Lost Your Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--tab end -->
                                <!--tab -->
                                <div class="tab">
                                    <div id="tab-2" class="tab-content">
                                        <h3>Sign Up <span>Easy<strong>Book</strong></span></h3>
                                        <div class="custom-form">
                                            <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                                <label >Full Name <span>*</span> </label>
                                                <input name="name" type="text"   onClick="this.select()" value="">
                                                <label>Email Address <span>*</span></label>
                                                <input name="email" type="text"  onClick="this.select()" value="">
                                                <label >Password <span>*</span></label>
                                                <input name="password" type="password"   onClick="this.select()" value="" >
                                                <button type="submit"     class="log-submit-btn"  ><span>Register</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--tab end -->
                            </div>
                            <!--tabs end -->
                            <div class="log-separator fl-wrap"><span>or</span></div>
                            <div class="soc-log fl-wrap">
                                <p>For faster login or register use your social account.</p>
                                <a href="#" class="facebook-log"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
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
        <script type="text/javascript" src="js/charts.js"></script> 
        <script type="text/javascript" src="js/dasboard.js"></script>         
    </body>
</html>