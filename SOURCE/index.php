<?php 

    session_start();
    // session_destroy();

    include_once 'connectdb.php';
    
?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>SMILE THAI ROOF</title>
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
                    <!--section -->
                    <section class="hero-section" data-scrollax-parent="true" id="sec1">
                        <div class="hero-parallax">
                            <div class="bg"  data-bg="images/bg/2.png" data-scrollax="properties: { translateY: '200px' }"></div>
                            <div class="overlay op7"></div>
                        </div>
                        <div class="hero-section-wrap fl-wrap">
                            <div class="container">
                                <div class="home-intro">
                                    <div class="section-title-separator"><span></span></div>
                                    <h2>SMILE THAI ROOF</h2>
                                    <span class="section-separator"></span>                                    
                                    <h3>เว็ปไซต์รวบรวมแหล่งที่พักในประเทศไทย</h3>
                                </div>
                                <!-- <form action="">
                                    <div class="main-search-input-wrap">
                                        <div class="main-search-input fl-wrap">
                                            <div class="main-search-input-item location" id="autocomplete-container">
                                                <span class="inpt_dec"><i class="fal fa-map-marker"></i></span>
                                                <input type="text" placeholder="เมืองที่พัก" name="location" class="autocomplete-input" id="autocompleteid2"  value=""/>
                                                <a href="#"><i class="fal fa-dot-circle"></i></a>
                                            </div>
                                            <div class="main-search-input-item main-date-parent main-search-input-item_small">
                                                <span class="inpt_dec"><i class="fal fa-calendar-check"></i></span> <input type="text" placeholder="วันที่ต้องการพัก" name="main-input-search"   value=""/>
                                            </div>
                                            <div class="main-search-input-item">
                                                <div class="qty-dropdown fl-wrap">
                                                    <div class="qty-dropdown-header fl-wrap"><i class="fal fa-users"></i>จำนวนคน</div>
                                                    <div class="qty-dropdown-content fl-wrap">
                                                        <div class="quantity-item">
                                                            <label><i class="fas fa-male"></i>ผู้ใหญ่</label>
                                                            <div class="quantity">
                                                                <input type="number" min="1" max="3" step="1" value="0">
                                                            </div>
                                                        </div>
                                                        <div class="quantity-item">
                                                            <label><i class="fas fa-child"></i>เด็ก</label>
                                                            <div class="quantity">
                                                                <input type="number" min="0" max="3" step="1" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="main-search-button color2-bg" onclick="window.location.href='listing2.php'">ค้นหา<i class="fal fa-search"></i></button>
                                        </div>
                                    </div>
                                </form> -->
                            </div>
                        </div>
                        <div class="header-sec-link">
                            <div class="container"><a href="#sec2" class="custom-scroll-link color-bg"><i class="fal fa-angle-double-down"></i></a></div>
                        </div>
                    </section>
                    <!-- section end -->
                    <!--section -->          
                    <section id="sec2" class="grey-blue-bg">
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>โรงแรมที่เพิ่มล่าสุด</h2>
                                <span class="section-separator"></span>
                                <p>10 โรงแรมที่เพิ่มล่าสุดของทางเว็บไซต์</p>
                            </div>
                         </div>
                         
                            <?php 

                                // โรงแรมที่เพิ่มล่าสุด
                                $query = "SELECT *, round(AVG(rev.score_to),1) as sot FROM users_add_hotel as addho 
                                                INNER JOIN room_in_hotel as inho ON inho.ref_id = addho.ref_id
                                                INNER JOIN users as us ON us.id = addho.ref_id
                                                LEFT JOIN review_hotels as rev ON rev.ref_hotel = addho.ref_id
                                            WHERE addho.status_hotel = 'ผ่านการตรวจสอบ' 
                                            GROUP BY addho.ref_id
                                            ORDER BY addho.create_date DESC LIMIT 10";

                                $result = mysqli_query($conn, $query);                                

                            ?>
                            <!-- portfolio start -->
                            <!--container-->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--light-carousel-wrap-->
                                        <div class="light-carousel-wrap fl-wrap">
                                            <!--light-carousel-->
                                            <div class="light-carousel">
                                                <?php 
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $sot=$row['sot'];
                                                        if ($sot != ''){
                                                            $sot=$row['sot'];
                                                        } else {
                                                            $sot='0';
                                                        }  
                                                ?>
                                                <!--slick-slide-item-->
                                                <div class="slick-slide-item">
                                                    <div class="hotel-card fl-wrap title-sin_item">
                                                        <div class="geodir-category-img card-post">
                                                            <a href="listing-single.php?id=<?php echo $row['ref_id']; ?>" target="_blank"><img src="images/images_hotel_users/<?php echo $row['picture']; ?>" alt=""></a>
                                                            <div class="listing-counter">ล่าสุด</strong></div>
                                                            <!-- <div class="sale-window">Sale 20%</div> -->
                                                            <div class="geodir-category-opt">
                                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $row['sot']; ?>"></div>
                                                                <h4 class="title-sin_map"><a href="listing-single.php?id=<?php echo $row['ref_id']; ?>" target="_blank"><?php echo $row['name_hotel']; ?></a></h4>
                                                                <div class="geodir-category-location"><a href="#" class="single-map-item"><i class="fas fa-map-marker-alt"></i><?php echo "ต.",$row['sub_area']," อ.",$row['area'], " " ,$row['province']; ?></a></div>
                                                                <div class="rate-class-name">
                                                                    <div class="score"><strong>คะแนน </strong></div>
                                                                    <span><?php echo $sot; ?></span>
                                                                                                         
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                                    } 
                                                ?>
                                                <!--slick-slide-item end-->                                         
                                            </div>
                                            <!--light-carousel end-->
                                            <div class="swiper-button-prev sw-btn lc-prev"><i class="fa fa-long-arrow-left"></i></div>
                                            <div class="swiper-button-next sw-btn  lc-next"><i class="fa fa-long-arrow-right"></i></div>
                                        </div>
                                        <!--light-carousel-wrap end-->
                                    </div>
                                </div>
                            </div>
                            <!-- portfolio end -->
                            <!-- listing.html -->
                        <a href="listing2.php?act=see-all" class="btn color-bg" style="margin-top: 50px;">ดูแหล่งที่พักทั้งหมด<i class="fas fa-caret-right"></i></a>
                    </section>
                    <!-- section end --> 
                    

                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>รีวิวแหล่งที่พัก</h2>
                                <span class="section-separator"></span>
                                <p>ความคิดเห็นและคะแนนที่ผู้ใช้งานให้กับโรงแรมต่าง ๆ</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!--slider-carousel-wrap -->
                        <div class="slider-carousel-wrap text-carousel-wrap fl-wrap">
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                            <div class="text-carousel single-carousel fl-wrap">
                                <?php 
                                    $query_re = "SELECT *,round(AVG(rev.score_to),1) as sot2 FROM review_hotels as rev                                            
                                                        INNER JOIN users as us ON us.id = rev.ref_user
                                                        INNER JOIN users_add_hotel as adho ON adho.ref_id = rev.ref_hotel
                                                    GROUP BY rev.id_review
                                                    ORDER BY rev.create_date_co DESC LIMIT 20";

                                    $result_re = mysqli_query($conn, $query_re); 
                                    while($row_re = mysqli_fetch_array($result_re)) {
                                ?>
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="images/img_users/<?php echo $row_re['picture_users']; ?>" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $row_re['sot2']; ?>"> </div>
                                        <div class="review-owner fl-wrap"><?php echo $row_re['name']; ?> - <span><?php echo $row_re['name_hotel']; ?></span></div>
                                        <p> "<?php echo $row_re['comment_ho']; ?>"</p>
                                    </div>
                                </div>
                                <?php } ?>
                                <!--slick-item end -->
                            </div>
                        </div>
                        <!--slider-carousel-wrap end-->
                    </section>
                    <!-- section end-->

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
        <script type="text/javascript" src="js/map-single.js"></script>
        <!-- Script สำหรับ Check Password -->
        <script type="text/javascript" src="js/check-password.js"></script>         
    </body>
</html>