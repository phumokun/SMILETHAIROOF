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
                        INNER JOIN room_in_hotel as inho ON inho.ref_id = addho.ref_id
                        INNER JOIN users as us ON us.id = addho.ref_id
                    WHERE addho.ref_id = $id AND addho.status_hotel = 'ผ่านการตรวจสอบ' 
                    GROUP BY inho.ref_id";
                
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        $ref_host = $row['ref_id'];

        // echo $query;
        // exit();
        
        // echo '<pre>';
        // print_r ($name_ho);
        // echo '</pre>';
        // exit();
    }

    // หาค่าเฉลี่ย Score Total และนับจำนวนผู้รีวิว
    $query_rev = "SELECT *, round(AVG(score_to),1) as sot,
                            round(AVG(score_cl),1) as scl, 
                            round(AVG(score_es),1) as ses,
                            round(AVG(score_st),1) as sst,
                            round(AVG(score_fa),1) as sfa,
                            count(ref_hotel) as couh
                    FROM review_hotels 
                    WHERE ref_hotel = $id";
    $rr_rev = mysqli_query($conn, $query_rev);
    $row_rev = mysqli_fetch_assoc($rr_rev);

    $sot = $row_rev['sot'];
    if ($sot <= '1'){
        $sot = '1';
    } elseif ($sot <= '2') {
        $sot = '2';
    } elseif ($sot <= '3') {
        $sot = '3';
    } elseif ($sot <= '4') {
        $sot = '4';
    } else {
        $sot = '5';
    }
    
    $sot1=$row_rev['sot'];
    if ($sot1 != ''){
        $sot1=$row_rev['sot'];
    } else {
        $sot1='0';
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
                                            <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $sot; ?>"></div>
                                        </div>
                                        <h2><span><?php echo $row['name_hotel']; ?></span></h2>
                                        <div class="list-single-header-contacts fl-wrap">
                                            <ul>
                                            <!-- ที่อยู่ของโรงแรม -->
                                                <li><i class="far fa-phone"></i><a  href="#"><?php echo $row['phone_hotel']; ?></a></li>
                                                <li><i class="far fa-map-marker-alt"></i><a  href="#"><?php echo "ต.",$row['sub_area']," อ.",$row['area']," ",$row['province']; ?></a></li>
                                                <li><i class="far fa-envelope"></i><a  href="#"><?php echo $row['email_hotel']; ?></a></li>
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
                                                    <div class="score"><strong>คะแนน</strong><?php echo $row_rev['couh']; ?> รีวิว</div>
                                                    <span><?php echo $sot1; ?></span>                                             
                                                </div>
                                                <!-- list-single-hero-rating-list-->
                                                <div class="list-single-hero-rating-list">
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>ความสะอาด</span></div>
                                                        <div class="rate-item-bg" data-percent="<?php echo (($row_rev['scl'])/5)*100; ?>%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent"><?php echo $row_rev['scl']; ?></div>
                                                    </div>
                                                    <!-- rate item end-->
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>ความสะดวกสบาย</span></div>
                                                        <div class="rate-item-bg" data-percent="<?php echo (($row_rev['ses'])/5)*100; ?>%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent"><?php echo $row_rev['ses']; ?></div>
                                                    </div>
                                                    <!-- rate item end-->                                                        
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>พนักงาน</span></div>
                                                        <div class="rate-item-bg" data-percent="<?php echo (($row_rev['sst'])/5)*100; ?>%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent"><?php echo $row_rev['sst']; ?></div>
                                                    </div>
                                                    <!-- rate item end-->  
                                                    <!-- rate item-->
                                                    <div class="rate-item fl-wrap">
                                                        <div class="rate-item-title fl-wrap"><span>สิ่งอำนวยความสะดวก</span></div>
                                                        <div class="rate-item-bg" data-percent="<?php echo (($row_rev['sfa'])/5)*100; ?>%">
                                                            <div class="rate-item-line color-bg"></div>
                                                        </div>
                                                        <div class="rate-item-percent"><?php echo $row_rev['sfa']; ?></div>
                                                    </div>
                                                    <!-- rate item end--> 
                                                </div>
                                                <!-- list-single-hero-rating-list end-->
                                            </div>
                                            <!--  list-single-hero-rating  end-->
                                            <div class="clearfix"></div>
                                            <!-- list-single-hero-links-->
                                            <div class="list-single-hero-links">
                                                <!-- <a class="lisd-link" href="booking-single.html"><i class="fal fa-bookmark"></i> Book Now</a> -->
                                                <a class="custom-scroll-link lisd-link" href="#sec5"><i class="fal fa-comment-alt-check"></i>รีวิว</a>
                                            </div>
                                            <!--  list-single-hero-links end-->                                            
                                        </div>
                                        <!--  list-single-hero-details  end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--  section  end-->
                    <!--  section  -->
                    <section class="grey-blue-bg small-padding scroll-nav-container" id="sec2">
                        <!--  scroll-nav-wrapper  -->
                        <div class="scroll-nav-wrapper fl-wrap">
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

                                                <!-- เลือกรูปภาพมาแสดงผล -->
                                                <?php 

                                                    $upmi = "SELECT * FROM uploads_multi_images as umi
                                                                WHERE umi.ref_host = $id";
                                                    $upmi_re = mysqli_query($conn, $upmi); 
                                                    while ($row_upmi = mysqli_fetch_array($upmi_re)) { 
                                                    
                                                ?>
                                                <!-- 1 -->
                                                <div class="gallery-item ">
                                                    <div class="grid-item-holder">
                                                        <div class="box-item">
                                                            <img  src="images/images_hotel_users/<?php echo $row_upmi['picture_hotel']; ?>"   alt="">
                                                            <a href="images/images_hotel_users/<?php echo $row_upmi['picture_hotel']; ?>" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                                    } 
                                                ?>
                                                <!-- 1 end -->
                                            </div>
                                            <!-- end gallery items -->                                          
                                        </div>
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>เกี่ยวกับโรงแรม</h3>
                                            </div>
                                            <p><?php echo $row['detail_hotel']; ?></p>
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
                                                    } 
                                                ?>
                                            </div>
                                        </div>
                                        <!--   list-single-main-item end -->     
                                        <!-- accordion-->
                                        <?php 
                                            // query ประเภทห้อง
                                            $room_inho = "SELECT * FROM room_in_hotel 
                                                            WHERE ref_id = $id";
                                            $rrih = mysqli_query($conn, $room_inho); 
                                            while ($row_rih = mysqli_fetch_assoc($rrih)) { 
                                        ?>
                                        <div class="accordion">
                                            <a class="toggle act-accordion" href="#">เกี่ยวกับห้องพัก <?php echo $row_rih['type_bed']; ?><span></span></a>
                                            <div class="accordion-inner visible">
                                                <p><?php echo $row_rih['detail_room']; ?></p>
                                                <h3>สิ่งอำนวยความสะดวก : </h3><p><?php echo $row_rih['option_room']; ?></p>
                                            </div>
                                        </div>
                                        <?php 
                                            } 
                                        ?>
                                        <!-- accordion end -->     

                                        
    
                                        <!-- list-single-main-item -->   
                                        <div class="list-single-main-item fl-wrap" id="sec5">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>รีวิวจากผู้ใช้งาน : <span><?php echo $row_rev['couh']; ?> ท่าน</span></h3>
                                            </div>
                                            <!--reviews-score-wrap-->   
                                            <div class="reviews-score-wrap fl-wrap">
                                                <div class="review-score-total">
                                                    <span>
                                                    <?php echo $row_rev['sot']; ?>
                                                    <strong>คะแนน</strong>
                                                    </span>
                                                    <a href="#sec6" class=" custom-scroll-link color2-bg" >แสดงความคิดเห็น</a>
                                                </div>
                                                <div class="review-score-detail">
                                                    <!-- review-score-detail-list-->
                                                    <div class="review-score-detail-list">
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>ความสะอาด</span></div>
                                                            <div class="rate-item-bg" data-percent="<?php echo (($row_rev['scl'])/5)*100; ?>%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent"><?php echo $row_rev['scl']; ?></div>
                                                        </div>
                                                        <!-- rate item end-->
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>ความสะดวกสบาย</span></div>
                                                            <div class="rate-item-bg" data-percent="<?php echo (($row_rev['ses'])/5)*100; ?>%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent"><?php echo $row_rev['ses']; ?></div>
                                                        </div>
                                                        <!-- rate item end-->                                                        
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>พนักงาน</span></div>
                                                            <div class="rate-item-bg" data-percent="<?php echo (($row_rev['sst'])/5)*100; ?>%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent"><?php echo $row_rev['sst']; ?></div>
                                                        </div>
                                                        <!-- rate item end-->  
                                                        <!-- rate item-->
                                                        <div class="rate-item fl-wrap">
                                                            <div class="rate-item-title fl-wrap"><span>สิ่งอำนวยความสะดวก</span></div>
                                                            <div class="rate-item-bg" data-percent="<?php echo (($row_rev['sfa'])/5)*100; ?>%">
                                                                <div class="rate-item-line color-bg"></div>
                                                            </div>
                                                            <div class="rate-item-percent"><?php echo $row_rev['sfa']; ?></div>
                                                        </div>
                                                        <!-- rate item end--> 
                                                    </div>
                                                    <!-- review-score-detail-list end-->
                                                </div>
                                            </div>
                                           
                                            <!-- reviews-score-wrap end -->   
                                            <div class="reviews-comments-wrap">
                                            <?php
                                                $query_re = "SELECT * FROM review_hotels as re
                                                                INNER JOIN users as us ON us.id = re.ref_user
                                                            WHERE re.ref_hotel = $id
                                                            ORDER BY re.create_date_co DESC";
                                                $rr_re = mysqli_query($conn, $query_re);
                                                $row_re = mysqli_fetch_assoc($rr_re);
                                                
                                                $rr_re = mysqli_query($conn, $query_re);
                                                $i=1;
                                                while ($row_re = mysqli_fetch_assoc($rr_re)) {

                                            ?>
                                                <!-- reviews-comments-item -->  
                                                <div class="reviews-comments-item">
                                                    <div class="review-comments-avatar">
                                                        <img src="images/img_users/<?php echo $row_re['picture_users']; ?>" alt=""> 
                                                    </div>
                                                    <div class="reviews-comments-item-text">
                                                        <h4><a href="#"><?php echo $row_re['name']; ?></a></h4>
                                                        <div class="review-score-user">
                                                            <span><?php echo ($row_re['score_cl']+$row_re['score_es']+$row_re['score_st']+$row_re['score_fa'])/4; ?></span>
                                                            <strong>ให้คะแนน</strong>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p>" <?php echo $row_re['comment_ho']; ?> "</p>
                                                        <div class="reviews-comments-item-date"><span><i class="far fa-calendar-check"></i><?php echo $row_re['create_date_co']; ?></span></div>
                                                    </div>
                                                </div>
                                            <?php
                                                if($i>=2) {
                                                    break;
                                                    $i++;
                                                }
                                            }
                                            ?>
                                                <!--reviews-comments-item end-->                                                                  
                                            </div>
                                        </div>
                                        <!-- list-single-main-item end -->   
                                        <!-- list-single-main-item -->   
                                        <div class="list-single-main-item fl-wrap" id="sec6">
                                            <div class="list-single-main-item-title fl-wrap">
                                                <h3>ให้คะแนนกับโรงแรมนี้</h3>
                                            </div>
                                            <!-- Add Review Box -->
                                            <div id="add-review" class="add-review-box">
                                                <!-- Review Comment -->
                                                <form action="layouts/action-add-review-hotel.php?id=<?php echo $id; ?>" method="POST" id="add-comment" class="add-comment  custom-form" name="rangeCalc" >
                                                    <fieldset>
                                                        <div class="review-score-form fl-wrap">
                                                            <div class="review-range-container">
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">ความสะอาด</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl[]"  data-step="1" value="1">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">ความสะดวกสบาย</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl[]"  data-step="1"  value="1">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">พนักงาน</div>
                                                                    <div class="range-slider-wrap ">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl[]"  data-step="1" value="1" >
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end --> 
                                                                <!-- review-range-item-->
                                                                <div class="review-range-item">
                                                                    <div class="range-slider-title">สิ่งอำนวยความสะดวก</div>
                                                                    <div class="range-slider-wrap">
                                                                        <input type="text" class="rate-range" data-min="0" data-max="5"  name="rgcl[]"  data-step="1" value="1">
                                                                    </div>
                                                                </div>
                                                                <!-- review-range-item end -->                                     
                                                            </div>
                                                            <div class="review-total">
                                                                <span><input type="text" name="rg_total"  data-form="AVG({rgcl[]})" value="0"></span>    
                                                                <strong>คะแนนรวม</strong>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="row">
                                                            <div class="col-md-6">
                                                                <label><i class="fal fa-user"></i></label>
                                                                <input type="text" placeholder="Your Name *"  value=""/>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label><i class="fal fa-envelope"></i>  </label>
                                                                <input type="text" placeholder="Email Address*" value=""/>
                                                            </div>
                                                        </div> -->
                                                        <div class="range-slider-title">แสดงความคิดเห็น</div>
                                                        <textarea cols="40" rows="3" name="comment_t"></textarea>
                                                    </fieldset>
                                                    <button class="btn  big-btn flat-btn float-btn color2-bg" style="margin-top:30px">ส่งความคิดเห็น<i class="fal fa-paper-plane"></i></button>
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
                                                        // query ข้อมูลประเภทห้อง
                                                        $query_bk = "SELECT * FROM room_in_hotel as inho
                                                                        INNER JOIN type_bed as tb ON tb.type_bed = inho.type_bed
                                                                    WHERE inho.ref_id = $id
                                                                    GROUP BY inho.type_bed";
                                                        
                                                        // $query = "SELECT * FROM type_bed ORDER BY id ASC";   
                                                                
                                                        $result_bk = mysqli_query($conn, $query_bk);
                                                        $row_bk = mysqli_fetch_array($result_bk);

                                                        $num_adult = $row_bk['num_adult'];
                                                        $num_kid = $row_bk['num_kid'];

                                                        // $id_host = $_GET['act'];
                                                        
                                                        // echo '<pre>';
                                                        // print_r ($id);
                                                        // echo '</pre>';
                                                        // exit();                                                                        
                                                    ?>

                                                    <form action="booking-single.php?id=<?php echo $id; ?>" method="POST" name="bookFormCalc"   class="book-form custom-form">
                                                        <fieldset>
                                                            <div class="cal-item">
                                                                <div class="listsearch-input-item">
                                                                    <label>ประเภทห้อง</label>
                                                                    <select data-placeholder="Room Type" name="repopt"  class="chosen-select no-search-select" >
                                                                        <?php 
                                                                            $result_bk = mysqli_query($conn, $query_bk);
                                                                            while ($row_bk = mysqli_fetch_array($result_bk)) { 
                                                                                        // เอา Id_room ไปลบ
                                                                                        $id_room = $row_bk['id_room'];
                                                                                        // หาค่าห้องว่าง ห้องไหนเหลือกี่ห้อง
                                                                                        $count_rfr = "SELECT *,COUNT(ref_room) as rfr FROM books
                                                                                                        WHERE ref_host = $id AND ref_room = $id_room
                                                                                                        GROUP BY ref_room";

                                                                                        $resul_rfr = mysqli_query($conn, $count_rfr);
                                                                                        $row_rfr = mysqli_fetch_array($resul_rfr);

                                                                                        $rfr = $row_rfr['rfr'];
                                                                        ?>
                                                                        <option value="<?php echo $row_bk['type_bed']; ?>"><?php echo $row_bk['type_bed']; ?> ว่าง <?php echo $row_bk['no_bed'] - $rfr;?> ห้อง</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <!--data-formula -->
                                                                    <input type="text" name="item_total" class="hid-input"  value=""  data-form="{repopt}">
                                                                    <input type="text" name="count_room" class="hid-input" value="<?php echo $rfr; ?>">
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
                                                                        <input type="number" name="qty3" min="0" max="<?php echo $num_adult; ?>" step="1" value="0">
                                                                        <input type="text" name="item_total" class="hid-input" value="0" data-form="{qty3} * {repopt} - {repopt}">
                                                                    </div>
                                                                </div>
                                                                <div class="quantity-item fl-wrap fcit">
                                                                    <label>เด็ก</label>
                                                                    <div class="quantity">
                                                                        <input type="number"  name="qty2" min="0" max="<?php echo $num_kid; ?>" step="1" value="0">
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
   
                                                            $query_about = "SELECT * FROM users_add_hotel as addho
                                                                                INNER JOIN users as us ON addho.ref_id = us.id
                                                                            WHERE addho.ref_id = " .$id;
                                                                    
                                                            $result_ab = mysqli_query($conn, $query_about);
                                                            $row_ab = mysqli_fetch_array($result_ab);
                                                                     
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
                                                            <li><span><i class="fal fa-map-marker"></i>ที่ตั้ง : </span> <a href="#"><?php echo "ต.",$row_ab['sub_area']," อ.",$row_ab['area']," ",$row_ab['province']; ?></a></li>
                                                            <li><span><i class="fal fa-phone"></i>โทร :</span> <a href="#"><?php echo $row_ab['phone_hotel']; ?></a></li>
                                                            <li><span><i class="fal fa-envelope"></i> E-Mail :</span> <a href="#"><?php echo $row_ab['email_hotel']; ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="list-widget-social">
                                                        <ul>
                                                            <li><a href="<?php echo $row_ab['facebook']; ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="<?php echo $row_ab['instagram']; ?>" target="_blank" ><i class="fab fa-instagram"></i></a></li>
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
                                                    <div class="box-widget-item-header">
                                                        <h3>เจ้าของที่พัก</h3>
                                                    </div>
                                                    <div class="box-widget-author fl-wrap">
                                                        <div class="box-widget-author-title fl-wrap">
                                                            <div class="box-widget-author-title-img">
                                                                <img src="images/img_users/<?php echo $row_ab['picture_users']; ?>" alt=""> 
                                                            </div>
                                                            <a href="#"><?php echo $row_ab['name']; ?></a>
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
                                                        <h3>โรงแรมเพิ่มล่าสุด</h3>
                                                    </div>
                                                    <div class="widget-posts fl-wrap">
                                                        <ul>
                                                            <!-- โรงแรมเพิ่มล่าสุด -->
                                                            <?php 

                                                                // หาค่าเฉลี่ย Score Total และนับจำนวนผู้รีวิว
                                                                $query = "SELECT *, round(AVG(score_to),1) as sot FROM users_add_hotel as addho 
                                                                                INNER JOIN room_in_hotel as inho ON inho.ref_id = addho.ref_id
                                                                                LEFT JOIN review_hotels as rev ON rev.ref_hotel = addho.ref_id
                                                                            WHERE addho.status_hotel = 'ผ่านการตรวจสอบ' 
                                                                            GROUP BY addho.ref_id
                                                                            ORDER BY addho.create_date DESC LIMIT 3";
                                
                                                                $result = mysqli_query($conn, $query); 
                                                                while ($row = mysqli_fetch_array($result)) {      
                                                            ?>
                                                            <li class="clearfix">
                                                                <a href="listing-single.php?id=<?php echo $row['ref_id']; ?>"  class="widget-posts-img"><img src="images/images_hotel_users/<?php echo $row['picture']; ?>" class="respimg" alt=""></a>
                                                                <div class="widget-posts-descr">
                                                                    <a href="listing-single.php?id=<?php echo $row['ref_id']; ?>" title=""><?php echo $row['name_hotel']; ?></a>
                                                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $row['sot']; ?>"></div>
                                                                    <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i><?php echo "ต.",$row['sub_area']," อ.",$row['area'], " " ,$row['province']; ?></a></div>
                                                                    <!-- <span class="rooms-price">$80 <strong> /  ต่อ</strong></span> -->
                                                                </div>
                                                            </li>
                                                            <?php 
                                                                } 
                                                            ?>
                                                        </ul>
                                                        <a class="widget-posts-link" href="listing2.php?act=see-all">โรงแรมทั้งหมด<i class="fal fa-long-arrow-right"></i> </a>
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