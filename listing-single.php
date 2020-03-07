<?php

    session_start();

    include_once 'connectdb.php';
    
    include('layouts/alert-please-login.php');

    // echo '<pre>';
    // print_r ($_GET);
    // echo '</pre>';
    // exit();

    // รับ Parameter GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // ใช้ INNER JOIN เพราะ ที่อยู่โรงแรมกับห้องในโรงแรมแยก Table กัน
        $query = "SELECT * FROM  users_add_hotel as addho
                        INNER JOIN room_in_hotel as inho ON addho.ref_id = inho.ref_id
                        INNER JOIN users as us ON addho.ref_id = us.id
                    WHERE addho.ref_id = $id
                    GROUP BY inho.ref_id ";
                
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        $name_ho = $row['name_hotel'];
        $id_hotel = $row['id_hotel'];

        // echo $query;
        // exit();
        
        // echo '<pre>';
        // print_r ($name_ho);
        // echo '</pre>';
        // exit();
    }
 

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
                    <!--  section  -->
                    <section class="list-single-hero" data-scrollax-parent="true" id="sec1">
                        <div class="bg par-elem "  data-bg="images/images_hotel_users/<?php echo $row['picture']; ?>" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="list-single-hero-title fl-wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="listing-rating-wrap">
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                        </div>
                                        <h2><span><?php echo $row['name_hotel']; ?></span></h2>
                                        <div class="list-single-header-contacts fl-wrap">
                                            <ul>
                                            <!-- ที่อยู่ของโรงแรม -->
                                                <li><i class="far fa-phone"></i><a  href="#"><?php echo $row['phone']; ?></a></li>
                                                <li><i class="far fa-map-marker-alt"></i><a  href="#"><?php echo "ต.",$row['sub_area']," อ.",$row['area']," จ.",$row['province']; ?></a></li>
                                                <li><i class="far fa-envelope"></i><a  href="#"><?php echo $row['email']; ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- listing-single -->

                                    <div class="col-md-5">
                                        <!--  list-single-hero-details-->
                                        <div class="list-single-hero-details fl-wrap">
                                            <!--  list-single-hero-rating-->
                                            <div class="list-single-hero-rating">
                                                <div class="rate-class-name">
                                                    <div class="score"><strong>Very Good</strong>2 Reviews </div>
                                                    <span>4.5</span>                                             
                                                </div>
                                                <!-- list-single-hero-rating-list-->
                                                <div class="list-single-hero-rating-list">
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>Cleanliness</span></div>
                                                        <div class="rate-item-bg" data-percent="100%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent">5.0</div>
                                                    </div>
                                                    <!-- rate item end-->
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>Comfort</span></div>
                                                        <div class="rate-item-bg" data-percent="90%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent">5.0</div>
                                                    </div>
                                                    <!-- rate item end-->                                                        
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>Staf</span></div>
                                                        <div class="rate-item-bg" data-percent="80%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent">4.0</div>
                                                    </div>
                                                    <!-- rate item end-->  
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>Facilities</span></div>
                                                        <div class="rate-item-bg" data-percent="90%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent">4.5</div>
                                                    </div>
                                                    <!-- rate item end--> 
                                                </div>
                                                <!-- list-single-hero-rating-list end-->
                                            </div>
                                            <!--  list-single-hero-rating  end-->
                                            <div class="clearfix"></div>
                                            <!-- list-single-hero-links-->
                                            <div class="list-single-hero-links">
                                                <a class="lisd-link" href="booking-single.html"><i class="fal fa-bookmark"></i> Book Now</a>
                                                <a class="custom-scroll-link lisd-link" href="#sec6"><i class="fal fa-comment-alt-check"></i> Add review</a>
                                            </div>
                                            <!--  list-single-hero-links end-->                                            
                                        </div>
                                        <!--  list-single-hero-details  end-->
                                    </div>
                                </div>
                                <div class="breadcrumbs-hero-buttom fl-wrap">
                                    <div class="breadcrumbs"><a href="#">Home</a><a href="#">Listings</a><a href="#">New York</a><span>Listing Single</span></div>
                                    <div class="list-single-hero-price">ราคา/คืน<span><?php echo $row['price_adult']; ?> บาท</span></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!--  section  -->
                    <section class="grey-blue-bg small-padding scroll-nav-container" id="sec2">
                        <!--  scroll-nav-wrapper  -->
                        <div class="scroll-nav-wrapper fl-wrap">
                            <div class="hidden-map-container fl-wrap">
                                <input id="pac-input" class="controls fl-wrap controls-mapwn" type="text" placeholder="What Nearby ?   Bar , Gym , Restaurant ">
                                <div class="map-container">
                                    <div id="singleMap" data-latitude="<?php echo $row['latitude']; ?>" data-longitude="<?php echo $row['longitude']; ?>"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="container">
                                <nav class="scroll-nav scroll-init">
                                    <ul>
                                        <li><a class="act-scrlink" href="#sec1">Top</a></li>
                                        <li><a href="#sec2">เกี่ยวกับห้องพัก</a></li>
                                        <li><a href="#sec3">สิ่งอำนวยความสะดวก</a></li>
                                        <li><a href="#sec4">ห้องที่ว่าง</a></li>
                                        <li><a href="#sec5">รีวิว</a></li>
                                    </ul>
                                </nav>
                                <!-- <a href="#" class="show-hidden-map">  <span>On The Map</span> <i class="fal fa-map-marked-alt"></i></a> -->
                            </div>
                        </div>
                        <!--  scroll-nav-wrapper end  -->                    
                        <!--   container  -->
                        <div class="container">
                            <!--   row  -->
                            <div class="row">
                                <!--   datails -->
                                <div class="col-md-8">
                                    <div class="list-single-main-container ">
                                        <!-- fixed-scroll-column  -->
                                        <div class="fixed-scroll-column">
                                            <div class="fixed-scroll-column-item fl-wrap">
                                                <div class="showshare sfcs fc-button"><i class="far fa-share-alt"></i><span>Share </span></div>
                                                <div class="share-holder fixed-scroll-column-share-container">
                                                    <div class="share-container  isShare"></div>
                                                </div>
                                                <a class="fc-button custom-scroll-link" href="#sec6"><i class="far fa-comment-alt-check"></i> <span>  Add review </span></a>
                                                <a class="fc-button" href="#"><i class="far fa-heart"></i> <span>Save</span></a>
                                                <a class="fc-button" href="booking-single.html"><i class="far fa-bookmark"></i> <span> Book Now </span></a>
                                            </div>
                                        </div>
                                        <!-- fixed-scroll-column end   -->
                                        <div class="list-single-main-media fl-wrap">
                                            <!-- gallery-items   -->
                                            <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                                                <!-- 1 -->
                                                <div class="gallery-item ">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="images/gal/1.jpg"   alt="">
                                                            <a href="images/gal/1.jpg" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 1 end -->
                                                <!-- 2 -->
                                                <div class="gallery-item">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="images/gal/1.jpg"   alt="">
                                                            <a href="images/gal/1.jpg" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 2 end -->
                                                <!-- 3 -->
                                                <div class="gallery-item gallery-item-second">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="images/gal/1.jpg"   alt="">
                                                            <a href="images/gal/1.jpg" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 3 end -->
                                                <!-- 4 -->
                                                <div class="gallery-item">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="images/gal/1.jpg"   alt="">
                                                            <a href="images/gal/1.jpg" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 4 end -->
                                                <!-- 5 -->
                                                <div class="gallery-item">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="images/gal/1.jpg"   alt="">
                                                            <a href="images/gal/1.jpg" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 5 end -->
                                                <!-- 7 -->
                                                <div class="gallery-item">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="images/gal/1.jpg"   alt="">
                                                            <div class="more-photos-button dynamic-gal"  data-dynamicPath="[{'src': 'images/gal/1.jpg'}, {'src': 'images/gal/1.jpg'},{'src': 'images/gal/1.jpg'}]">Other <span>4 photos</span><i class="far fa-long-arrow-right"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 7 end -->
                                            </div>
                                            <!-- end gallery items -->                                          
                                        </div>
                                        
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>เกี่ยวกับห้องพัก</h3>
                                            </div>
                                            <p><?php echo $row['detail_room']; ?></p>
                                        </div>
                                        <!--   list-single-main-item end -->
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="sec3">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>สิ่งอำนวยความสะดวก</h3>
                                            </div>
                                            <div class="listing-features fl-wrap">
                                                <?php
                                                    // ใช้คำสั่ง While ในการ Query ข้อมูลทั้งหมดของ Array นั้น ๆ
                                                    if ($result = mysqli_query($conn, $query)) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $option_hotels = explode( ",",$row['option_hotel']);
                                                            foreach($option_hotels as $option_hotel){
                                                ?>
                                                    <ul>
                                                        <li><i class="fal fa-rocket"></i><?php echo $option_hotel ?></li> 
                                                    </ul>
                                                    
                                                    <?php 
                                                        }
                                                    }
                                                } ?>
                                            </div>
                                       
                                            <?php 
                                       

                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_array($result);

                                            ?>
                                   
                                        </div>
                                        <!--   list-single-main-item end -->     
                                        <!-- accordion-->
                                        <div class="accordion">
                                            <a class="toggle act-accordion" href="#">เกี่ยวกับโรงแรม<span></span></a>
                                            <div class="accordion-inner visible">
                                                <p><?php echo $row['detail_hotel']; ?></p>
                                            </div>
                                        </div>
                                        <!-- accordion end -->                                                     
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap" id="sec4">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>ห้องที่ว่าง</h3>
                                            </div>
                                            <!--   rooms-container -->
                                            <div class="rooms-container fl-wrap">
                                                <!--  rooms-item -->
                                                <div class="rooms-item fl-wrap">
                                                    <div class="rooms-media">
                                                        <img src="images/gal/1.jpg" alt="">
                                                        <div class="dynamic-gal more-photos-button" data-dynamicPath="[{'src': 'images/gal/slider/1.jpg'}, {'src': 'images/gal/slider/1.jpg'},{'src': 'images/gal/slider/1.jpg'}]">  View Gallery <span>3 photos</span> <i class="far fa-long-arrow-right"></i></div>
                                                    </div>
                                                    <div class="rooms-details">
                                                        <div class="rooms-details-header fl-wrap">
                                                            <span class="rooms-price">$81 <strong> / person</strong></span>
                                                            <h3>Standard Family Room</h3>
                                                            <h5>Max Guests: <span>3 persons</span></h5>
                                                        </div>
                                                        <p>Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                        <div class="facilities-list fl-wrap">
                                                            <ul>
                                                                <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                                <li><i class="fal fa-bath"></i><span>1 Bathroom</span></li>
                                                                <li><i class="fal fa-snowflake"></i><span>Air conditioner</span></li>
                                                                <li><i class="fal fa-tv"></i><span> Tv Inside</span></li>
                                                                <li><i class="fas fa-concierge-bell"></i><span>Breakfast</span></li>
                                                            </ul>
                                                            <a href="rooms/room1.html" class="btn color-bg ajax-link">Details<i class="fas fa-caret-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  rooms-item end -->
                                                <!--  rooms-item -->
                                                <div class="rooms-item fl-wrap">
                                                    <div class="rooms-media">
                                                        <img src="images/gal/1.jpg" alt="">
                                                        <div class="dynamic-gal more-photos-button" data-dynamicPath="[{'src': 'images/gal/slider/1.jpg'}, {'src': 'images/gal/slider/1.jpg'}, {'src': 'images/gal/slider/1.jpg'} ]">View Gallery <span>3 photos</span> <i class="far fa-long-arrow-right"></i></div>
                                                    </div>
                                                    <div class="rooms-details">
                                                        <div class="rooms-details-header fl-wrap">
                                                            <span class="rooms-price">$122 <strong> / person</strong></span>
                                                            <h3>Superior Double Room</h3>
                                                            <h5>Max Guests: <span>4 persons</span></h5>
                                                        </div>
                                                        <p>Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                        <div class="facilities-list fl-wrap">
                                                            <ul>
                                                                <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                                <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                                <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                                <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                            </ul>
                                                            <a href="rooms/room2.html" class="btn color-bg ajax-link">Details<i class="fas fa-caret-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  rooms-item end -->   
                                                <!--  rooms-item -->
                                                <div class="rooms-item fl-wrap">
                                                    <div class="rooms-media">
                                                        <img src="images/gal/1.jpg" alt="">
                                                        <div class="dynamic-gal more-photos-button" data-dynamicPath="[{'src': 'images/gal/slider/1.jpg'},{'src': 'images/gal/slider/1.jpg'}, {'src': 'images/gal/slider/1.jpg'},{'src': 'images/gal/slider/1.jpg'}]"> View Gallery <span>4 photos</span> <i class="far fa-long-arrow-right"></i> </div>
                                                    </div>
                                                    <div class="rooms-details">
                                                        <div class="rooms-details-header fl-wrap">
                                                            <span class="rooms-price">$310 <strong> / person</strong></span>
                                                            <h3>Deluxe Single Room</h3>
                                                            <h5>Max Guests: <span>2 persons</span></h5>
                                                        </div>
                                                        <p>Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                        <div class="facilities-list fl-wrap">
                                                            <ul>
                                                                <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                                                                <li><i class="fal fa-parking"></i><span>Parking</span></li>
                                                                <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                                                                <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                                                            </ul>
                                                            <a href="rooms/room3.html" class="btn color-bg ajax-link">Details<i class="fas fa-caret-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  rooms-item end -->                                                      
                                            </div>
                                            <!--   rooms-container end -->
                                        </div>
                                        <!-- list-single-main-item end -->
                                        <!-- list-single-main-item -->   
                                        <div class="list-single-main-item fl-wrap" id="sec5">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Item Reviews -  <span> 2 </span></h3>
                                            </div>
                                            <!--reviews-score-wrap-->   
                                            <div class="reviews-score-wrap fl-wrap">
                                                <div class="review-score-total">
                                                    <span>
                                                    4.5
                                                    <strong>Very Good</strong>
                                                    </span>
                                                    <a href="#" class="color2-bg">Add Review</a>
                                                </div>
                                                <div class="review-score-detail">
                                                    <!-- review-score-detail-list-->
                                                    <div class="review-score-detail-list">
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>Cleanliness</span></div>
                                                            <div class="rate-item-bg" data-percent="100%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent">5.0</div>
                                                        </div>
                                                        <!-- rate item end-->
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>Comfort</span></div>
                                                            <div class="rate-item-bg" data-percent="90%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent">5.0</div>
                                                        </div>
                                                        <!-- rate item end-->                                                        
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>Staf</span></div>
                                                            <div class="rate-item-bg" data-percent="80%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent">4.0</div>
                                                        </div>
                                                        <!-- rate item end-->  
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>Facilities</span></div>
                                                            <div class="rate-item-bg" data-percent="90%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent">4.5</div>
                                                        </div>
                                                        <!-- rate item end--> 
                                                    </div>
                                                    <!-- review-score-detail-list end-->
                                                </div>
                                            </div>
                                            <!-- reviews-score-wrap end -->   
                                            <div class="reviews-comments-wrap">
                                                <!-- reviews-comments-item -->  
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="images/avatar/1.jpg" alt=""> 
                                                    </div>
                                                    <div class="reviews-comments-item-text">
                                                        <h4><a href="#">Liza Rose</a></h4>
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
                                                        <h4><a href="#">Adam Koncy</a></h4>
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
                                        <!-- list-single-main-item end -->   
                                        <!-- list-single-main-item -->   
                                        <div class="list-single-main-item fl-wrap" id="sec6">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>Add Review</h3>
                                            </div>
                                            <!-- Add Review Box -->
                                            <div id="add-review" class="add-review-box">
                                                <!-- Review Comment -->
                                                <form id="add-comment" class="add-comment  custom-form" name="rangeCalc" >
                                                    <fieldset>
                                                        <div class="review-score-form fl-wrap">
                                                            <div class="review-range-container">
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">Cleanliness</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="4">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">Comfort</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1"  value="1">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">Staf</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="5" >
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">Facilities</div>
                                                                    <div class="range-slider-wrap">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl"  data-step="1" value="3">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end -->                                     
                                                            </div>
                                                            <div class="review-total">
                                                                <span><input type="text" name="rg_total"  data-form="AVG({rgcl})" value="0"></span>    
                                                                <strong>Your Score</strong>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label><i class="fal fa-user"></i></label>
                                                                <input type="text" placeholder="Your Name *" value=""/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label><i class="fal fa-envelope"></i>  </label>
                                                                <input type="text" placeholder="Email Address*" value=""/>
                                                            </div>
                                                        </div>
                                                        <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                                    </fieldset>
                                                    <button class="btn  big-btn flat-btn float-btn color2-bg" style="margin-top:30px">Submit Review <i class="fal fa-paper-plane"></i></button>
                                                </form>
                                            </div>
                                            <!-- Add Review Box / End -->
                                        </div>
                                        <!-- list-single-main-item end -->                                    
                                    </div>
                                </div>
                                <!--   datails end  -->
                                <!--   sidebar  -->
                                <div class="col-md-4">
                                    <!--box-widget-wrap -->  
                                    <div class="box-widget-wrap">
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>จองโรงแรมนี้</h3>
                                                    </div>

                                                    <?php 

                                                        
                                                        $query = "SELECT * FROM room_in_hotel as inho
                                                                    INNER JOIN type_bed as tb ON tb.type_bed = inho.type_bed
                                                                    WHERE inho.ref_id = $id
                                                                    GROUP BY inho.type_bed";
                                                        
                                                        // $query = "SELECT * FROM type_bed ORDER BY id ASC";   
                                                                
                                                        $result = mysqli_query($conn, $query);

                                                        // $id_host = $_GET['act'];
                                                        
                                                        // echo '<pre>';
                                                        // print_r ($id);
                                                        // echo '</pre>';
                                                        // exit();                                                                        
                                                    ?>

                                                    <form action="booking-single.php?id=<?php echo $id; ?>&act=<?php echo $id_hotel; ?>" method="POST" name="bookFormCalc"   class="book-form custom-form">
                                                        <fieldset>
                                                            <div class="cal-item">
                                                                <div class="listsearch-input-item">
                                                                    <label>ประเภทห้อง</label>
                                                                    <select data-placeholder="Room Type" name="repopt"  class="chosen-select no-search-select" >
                                                                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                                        <option><?php echo $row['type_bed']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <!--data-formula -->
                                                                    <input type="text" name="item_total" class="hid-input"  value=""  data-form="{repopt}">
                                                                </div>
                                                            </div>
                                                            <div class="cal-item">
                                                                <div class="bookdate-container  fl-wrap">
                                                                    <label><i class="fal fa-calendar-check"></i>ช่วงเวลาที่เข้าพัก</label>
                                                                    <input type="text" placeholder="เลือกวันที่พัก" name="bookdates" value=""/>
                                                                    <div class="bookdate-container-dayscounter"><i class="far fa-question-circle"></i><span>Days : <strong>0</strong></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="cal-item">
                                                                <div class="quantity-item fl-wrap">
                                                                    <label><h6>ผู้ใหญ่</h6></label>
                                                                    <div class="quantity">
                                                                        <input type="number" name="qty3" min="0" max="3" step="1" value="0">
                                                                        <input type="text" name="item_total" class="hid-input" value="0" data-form="{qty3} * {repopt} - {repopt}">
                                                                    </div>
                                                                </div>
                                                                <div class="quantity-item fl-wrap fcit">
                                                                    <label>เด็ก</label>
                                                                    <div class="quantity">
                                                                        <input type="number"  name="qty2" min="0" max="3" step="1" value="0">
                                                                        <select name="sale" class="hid-input">
                                                                            <option value=".7"  selected>sale</option>
                                                                        </select>
                                                                        <input type="text" name="item_total" class="hid-input" value="0" data-form="({repopt} * {sale})*{qty2}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <input type="number"  id="totaldays" name="qty5" class="hid-input">
                                                        <!-- <div class="total-coast fl-wrap"><strong>รวม</strong> <span>บาท<input type="text" name="grand_total" value="" data-form="SUM({item_total}) * {qty5}"></span></div> -->
                                                        <button name="submit" class="btnaplly color2-bg">จองที่พักนี้<i class="fal fa-paper-plane"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                                                                           
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">

                                                    <?php 
  
                                                        
                                                            $query = "SELECT * FROM  users_add_hotel as addho
                                                                            INNER JOIN users as us ON addho.ref_id = us.id
                                                                        WHERE addho.ref_id = " .$id;
                                                                    
                                                            $result = mysqli_query($conn, $query);
                                                            $row = mysqli_fetch_array($result);
                                                        
                                                            
                                                            // echo '<pre>';
                                                            // print_r ($row);
                                                            // echo '</pre>';
                                                            // exit();
                                                       
                                                    
                                                    ?>

                                                    <div class="box-widget-item-header">
                                                        <h3>ข้อมูลการติดต่อ</h3>
                                                    </div>
                                                    <div class="box-widget-list">
                                                        <ul>
                                                            <li><span><i class="fal fa-map-marker"></i>ที่ตั้ง : </span> <a href="#"><?php echo "ต.",$row['sub_area']," อ.",$row['area']," จ.",$row['province']; ?></a></li>
                                                            <li><span><i class="fal fa-phone"></i>โทร :</span> <a href="#"><?php echo $row['phone']; ?></a></li>
                                                            <li><span><i class="fal fa-envelope"></i> E-Mail :</span> <a href="#"><?php echo $row['email']; ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-widget-social">
                                                        <ul>
                                                            <li><a href="<?php echo $row['facebook']; ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="<?php echo $row['instagram']; ?>" target="_blank" ><i class="fab fa-instagram"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                           
                        
                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    
                                                    <?php                   
                                                        // if (isset($_GET['act'])) {
                                                        //     $id = $_GET['act'];
                                                        //     $query = "SELECT * FROM users
                                                        //             WHERE id = " . $id;
                                                                    
                                                        //     $result = mysqli_query($conn, $query);
                                                        //     $row = mysqli_fetch_array($result);
                                                            
                                                        //     // echo '<pre>';
                                                        //     // print_r ($row);
                                                        //     // echo '</pre>';
                                                        //     // exit();
                                                        // }
                                                    ?>
                                                    
                                                
                                                    <div class="box-widget-item-header">
                                                        <h3>เจ้าของที่พัก</h3>
                                                    </div>
                                                    <div class="box-widget-author fl-wrap">
                                                        <div class="box-widget-author-title fl-wrap">
                                                            <div class="box-widget-author-title-img">
                                                                <img src="images/img_users/<?php echo $row['picture_users']; ?>" alt=""> 
                                                            </div>
                                                            <a href="#"><?php echo $row['name']; ?></a>
                                                            <span>4 Places Hosted</span>
                                                        </div>
                                                        <!-- <a href="#" class="btn flat-btn color-bg   float-btn image-popup">ดูโปร์ไฟล์<i class="fal fa-user-alt"></i></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->   

                                        <!-- โค้ดสภาพอากาศ -->
                                        <!--box-widget-item -->
                                        <!-- <div class="box-widget-item fl-wrap">
											<div id="weather-widget" class="gradient-bg ideaboxWeather" data-city="Thailand"></div>
                                        </div> -->
                                        <!--box-widget-item end --> 

                                        <!--box-widget-item -->
                                        <div class="box-widget-item fl-wrap">
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <div class="box-widget-item-header">
                                                        <h3>Similar Listings</h3>
                                                    </div>
                                                    <div class="widget-posts fl-wrap">
                                                        <ul>
                                                            <li class="clearfix">
                                                                <a href="#"  class="widget-posts-img"><img src="images/gal/1.jpg" class="respimg" alt=""></a>
                                                                <div class="widget-posts-descr">
                                                                    <a href="#" title="">Park Central</a>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 40 JOURNAL SQUARE PLAZA, NJ, US</a></div>
                                                                    <span class="rooms-price">$80 <strong> /  Awg</strong></span>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <a href="#"  class="widget-posts-img"><img src="images/gal/1.jpg" class="respimg" alt=""></a>
                                                                <div class="widget-posts-descr">
                                                                    <a href="#" title="">Holiday Home</a>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="3"></div>
                                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i> 75 PRINCE ST, NY, USA</a></div>
                                                                    <span class="rooms-price">$50 <strong> /   Awg</strong></span>
                                                                </div>
                                                            </li>
                                                            <li class="clearfix">
                                                                <a href="#"  class="widget-posts-img"><img src="images/gal/1.jpg" class="respimg" alt=""></a>
                                                                <div class="widget-posts-descr">
                                                                    <a href="#" title="">Moonlight Hotel</a>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4"></div>
                                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i>  70 BRIGHT ST NEW YORK, USA</a></div>
                                                                    <span class="rooms-price">$105 <strong> /  Awg</strong></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <a class="widget-posts-link" href="#">See All Listing <i class="fal fa-long-arrow-right"></i> </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--box-widget-item end -->                            
                                    </div>
                                    <!--box-widget-wrap end -->  
                                </div>
                                <!--   sidebar end  -->
                            </div>
                            <!--   row end  -->
                        </div>
                        <!--   container  end  -->
                    </section>
                    <!--  section  end-->
                </div>
                <!-- content end-->
                <div class="limit-box fl-wrap"></div>
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

            <!--ajax-modal-container-->
            <div class="ajax-modal-overlay"></div>
            <div class="ajax-modal-container">
                <!--ajax-modal -->
                <div class='ajax-loader'>
                    <div class='ajax-loader-cirle'></div>
                </div>
                <div id="ajax-modal" class="fl-wrap"> 
                </div>
                <!--ajax-modal-container end -->
            </div>
            <!--ajax-modal-container end -->

        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm7W3cZP4QiIDR3WxbIoAEhrM6o2GzU2g&libraries=places&callback=initAutocomplete"></script>  
        <script type="text/javascript" src="js/map-single.js"></script>         
    </body>
</html>