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
                                    <h3>SMTR</h3>
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
                    <section id="sec2">
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>เมืองยอดนิยม</h2>
                                <span class="section-separator"></span>
                                <p>เมืองที่ได้รับความนิยมที่สุดจากผู้ใช้งาน</p>
                            </div>
						 </div>
                            <!-- portfolio start -->
                            <div class="gallery-items fl-wrap mr-bot spad home-grid">
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>1</span> Hotels</div>
                                            <img  src="images/city/img1.png"   alt="">
                                            <div class="listing-item-cat">
                                                <!-- listing.html -->
                                                <h3><a href="#">ภูเก็ต</a></h3>
                                                <div class="weather-grid"   data-grcity="Rome"></div>
                                                <div class="clearfix"></div>
                                                <p>รายละเอียด</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item gallery-item-second">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <img  src="images/city/img5.png"   alt="">
                                            <div class="listing-counter"><span>1</span> Hotels</div>
                                            <div class="listing-item-cat">
                                                <h3><a href="#">ยะลา</a></h3>
                                                <div class="weather-grid"   data-grcity="Paris"></div>
                                                <div class="clearfix"></div>
                                                <p>รายละเอียด</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>1</span> Hotels</div>
                                            <img  src="images/city/img2.png"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="#">พัทลุง</a></h3>
                                                <div class="weather-grid"   data-grcity="London"></div>
                                                <div class="clearfix"></div>
                                                <p>รายละเอียด</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>1</span> Hotels</div>
                                            <img  src="images/city/img3.png"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="#">สงขลา</a></h3>
                                                <div class="weather-grid"   data-grcity="Dubai"></div>
                                                <div class="clearfix"></div>
                                                <p>รายละเอียด</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                                <!-- gallery-item-->
                                <div class="gallery-item">
                                    <div class="grid-item-holder">
                                        <div class="listing-item-grid">
                                            <div class="listing-counter"><span>1</span> Hotels</div>
                                            <img  src="images/city/img4.png"   alt="">
                                            <div class="listing-item-cat">
                                                <h3><a href="#">กระบี่</a></h3>
                                                <div class="weather-grid"   data-grcity="New York"></div>
                                                <div class="clearfix"></div>
                                                <p>รายละเอียด</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- gallery-item end-->
                            </div>
                            <!-- portfolio end -->
                            <!-- listing.html -->
                        <a href="listing2.php?act=see-all" class="btn color-bg">ดูแหล่งที่พักทั้งหมด<i class="fas fa-caret-right"></i></a>
                    </section>
                    <!-- section end --> 
                    
                    <!--section -->
                    <section class="parallax-section" data-scrollax-parent="true">
                        <div class="bg"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '100px' }"></div>
                        <div class="overlay op7"></div>
                        <!--container-->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="colomn-text fl-wrap pad-top-column-text_small">
                                        <div class="colomn-text-title">
                                            <h3>แหล่งที่พักยอดนิยม</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                                            <a href="listing.html" class="btn  color2-bg float-btn">ดูแหล่งที่พักยอดนิยม<i class="fas fa-caret-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!--light-carousel-wrap-->
                                    <div class="light-carousel-wrap fl-wrap">
                                        <!--light-carousel-->
                                        <div class="light-carousel">
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img card-post">
                                                        <a href="listing-single.html"><img src="images/gal/1.jpg" alt=""></a>
                                                        <div class="listing-counter">Awg/Night <strong>$85</strong></div>
                                                        <div class="sale-window">Sale 20%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="listing-single.html">Moonlight Hotel</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.90261483" data-newlongitude="-74.15737152"><i class="fas fa-map-marker-alt"></i> 75 Prince St,  NY, USA</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>8 Reviews </div>
                                                                <span>4.8</span>                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img">
                                                        <a href="listing-single.html"><img src="images/gal/1.jpg" alt=""></a>
                                                        <div class="listing-counter">Awg/Night <strong>$80</strong></div>
                                                        <div class="sale-window big-sale">Sale 50%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="listing-single.html">Holiday Home</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.72228267" data-newlongitude="-73.99246214"><i class="fas fa-map-marker-alt"></i> 34-42 Montgomery St , NY, USA</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>2 Reviews </div>
                                                                <span>4.7</span>                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->
                                            <!--slick-slide-item-->
                                            <div class="slick-slide-item">
                                                <div class="hotel-card fl-wrap title-sin_item">
                                                    <div class="geodir-category-img">
                                                        <a href="listing-single.html"><img src="images/gal/1.jpg" alt=""></a>
                                                        <div class="listing-counter">Awg/Night <strong>$120</strong></div>
                                                        <div class="sale-window">Sale 10%</div>
                                                        <div class="geodir-category-opt">
                                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                            <h4 class="title-sin_map"><a href="listing-single.html">Grand Hero Palace</a></h4>
                                                            <div class="geodir-category-location"><a href="#" class="single-map-item" data-newlatitude="40.76221766" data-newlongitude="-73.96511769"><i class="fas fa-map-marker-alt"></i> 70 Bright St New York, USA</a></div>
                                                            <div class="rate-class-name">
                                                                <div class="score"><strong> Good</strong>31 Reviews </div>
                                                                <span>4.9</span>                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--slick-slide-item end-->                                            
                                        </div>
                                        <!--light-carousel end-->
                                        <div class="fc-cont  lc-prev"><i class="fal fa-angle-left"></i></div>
                                        <div class="fc-cont  lc-next"><i class="fal fa-angle-right"></i></div>
                                    </div>
                                    <!--light-carousel-wrap end-->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
                    

                    <!--section -->
                    <section>
                        <div class="container">
                            <div class="section-title">
                                <div class="section-title-separator"><span></span></div>
                                <h2>รีวิวแหล่งที่พัก</h2>
                                <span class="section-separator"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <!--slider-carousel-wrap -->
                        <div class="slider-carousel-wrap text-carousel-wrap fl-wrap">
                            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
                            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
                            <div class="text-carousel single-carousel fl-wrap">
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Milka Antony  - <span>Happy Client</span></div>
                                        <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat."</p>
                                        <a href="#" class="testim-link">Via Facebook</a>
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                                        <div class="review-owner fl-wrap">Milka Antony  - <span>Happy Client</span></div>
                                        <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat."</p>
                                        <a href="#" class="testim-link">Via Facebook</a>
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Milka Antony  - <span>Happy Client</span></div>
                                        <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat."</p>
                                        <a href="#" class="testim-link">Via Facebook</a>
                                    </div>
                                </div>
                                <!--slick-item end -->
                                <!--slick-item -->
                                <div class="slick-item">
                                    <div class="text-carousel-item">
                                        <div class="popup-avatar"><img src="images/avatar/1.jpg" alt=""></div>
                                        <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                        <div class="review-owner fl-wrap">Milka Antony  - <span>Happy Client</span></div>
                                        <p> "In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat."</p>
                                        <a href="#" class="testim-link">Via Facebook</a>
                                    </div>
                                </div>
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