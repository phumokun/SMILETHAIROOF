<?php 

    session_start();
    // session_destroy();

    include_once 'connectdb.php';

    include('layouts/alert-please-login.php');

    $ref_hotel = $_GET['id'];

    // echo '<pre>';
    // print_r ($_POST);
    // echo '</pre>';
    // exit(); 

    // รับค่าจาก form
    $type_bed = $_POST['repopt'];
    $bookdates = explode( " - ",$_POST['bookdates']);
    $sumday = $_POST['qty5'];
    $adult = $_POST['qty3'];
    $kid = $_POST['qty2'];
 
    
    // ตั้งเงื่อนไขเพื่อทำ INNER JOIN
    $query = "SELECT * FROM room_in_hotel as inho
                    INNER JOIN users_add_hotel as addho ON inho.ref_id = addho.ref_id
                WHERE addho.ref_id = $ref_hotel AND type_bed = '" . $type_bed . "'
                GROUP BY inho.ref_id";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result); 

    $price_room = $row['price_room'];
    // $price_kid = $row['price_kid'];
    $id_room = $row['id_room'];
    $ref_id = $row['ref_id'];
    $id_hotel = $row['id_hotel'];


    // คำณวนราคา
    $price = $price_room*$sumday;


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
                    <!-- <div class="breadcrumbs-fs fl-wrap">
                        <div class="container">
                            <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Pages</a><span>Booking Page</span></div>
                        </div>
                    </div> -->
                    <section class="middle-padding gre y-blue-bg">
                        <div class="container">
                            <div class="list-main-wrap-title single-main-wrap-title fl-wrap">
                                <h2>จองโรงแรม : <span><?php echo $row['name_hotel']; ?></span></h2>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="bookiing-form-wrap">
                                        <!-- <ul id="progressbar">
                                            <li class="active"><span>01.</span>ข้อมูลส่วนตัว</li>
                                            <li><span>02.</span>ที่อยู่ปัจจุบัน</li>
                                            <li><span>03.</span>การจ่ายเงิน</li>
                                            <li><span>04.</span>ยืนยันการจ่ายเงิน</li>
                                        </ul> -->
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                            <div class="profile-edit-container">
                                                <div class="custom-form">
                                                    <!-- Omise -->
                                                    <form id="checkoutForm" action="layouts/action-booking-room.php" method="post">
                                                        <fieldset class="fl-wrap">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>ข้อมูลผู้จองที่พัก</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>ชื่อ - สกุล ผู้จอง<i class="far fa-user"></i></label>
                                                                    <input type="text" name="name_user" placeholder="Your Name" value="<?php echo $_SESSION['name']; ?>" readonly>  
                                                                    <input type="hidden" name="id_user" placeholder="Your Name" value="<?php echo $_SESSION['id']; ?>" readonly>                                                 
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>E-mail<i class="far fa-envelope"></i>  </label>
                                                                    <input type="text" name="email" placeholder="yourmail@domain.com" value="<?php echo $_SESSION['email']; ?>" readonly>                                                  
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>เบอร์โทร<i class="far fa-phone"></i>  </label>
                                                                    <input type="text" name="phone" placeholder="87945612233" value="<?php echo $_SESSION['phone_user']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="log-massage">Existing Customer? <a href="#" class="modal-open">Click here to login</a></div> -->
                                                            <!-- <div class="log-separator fl-wrap"><span>or</span></div>
                                                            <div class="soc-log fl-wrap">
                                                                <p>For faster login or register use your social account.</p>
                                                                <a href="#" class="facebook-log"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
                                                            </div> -->
                                                            <!-- <div class="filter-tags">
                                                                <input id="check-a" type="checkbox" name="check">
                                                                <label for="check-a">By continuing, you agree to the<a href="#" target="_blank">Terms and Conditions</a>.</label>
                                                            </div> -->
                                                            <span class="fw-separator"></span>


                                                            <input type="hidden" name="type_bed" value="<?php echo $type_bed; ?>"/>
                                                            <input type="hidden" name="in" value="<?php echo $bookdates[0]; ?>"/>
                                                            <input type="hidden" name="out" value="<?php echo $bookdates[1]; ?>"/>
                                                           
                                                            <input type="hidden" name="id_host" value="<?php echo $ref_id; ?>"/>
                                                            <input type="hidden" name="id_hotel" value="<?php echo $id_hotel; ?>"/>
                                                            <input type="hidden" name="id_room" value="<?php echo $id_room; ?>"/>
                                                            <input type="hidden" name="adult" value="<?php echo $adult; ?>"/>
                                                            <input type="hidden" name="kid" value="<?php echo $kid; ?>"/>
                                                            <input type="hidden" name="sumday" value="<?php echo $sumday; ?>"/>
                                                            
                                                            <a  href="#"  class="next-form action-button btn no-shdow-btn color-bg">ยืนยัน<i class="fal fa-angle-right"></i></a>
                                                            <!-- <button type="submit" name="submit" class="action-button btn no-shdow-btn color-bg">จองที่พัก<i class="fal fa-angle-right"></i></a> -->
                                                        </fieldset>
                                                        <fieldset class="fl-wrap">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>การจ่ายเงิน</h3>
                                                            </div>

                                                            <!-- Omise -->
                                                            <!-- <div id="token_errors"></div>
                                                            <input type="text" name="omise_token">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>ชื่อ<i class="far fa-user"></i></label>
                                                                    <input type="text" placeholder="กรุณากรอกชื่อหน้าบัตร" value="" data-omise="holder_name"/>                                                  
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>หมายเลขบัตร<i class="fal fa-credit-card-front"></i></label>
                                                                    <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" value="" data-omise="number"/> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label>เดือนหมดอายุ<i class="fal fa-calendar"></i></label>
                                                                    <input type="text" placeholder="MM" value="" data-omise="expiration_month" size="4"/>                                                  
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label>ปีหมดอายุ<i class="fal fa-calendar"></i></label>
                                                                    <input type="text" placeholder="YY" value="" data-omise="expiration_year" size="8"/>                                                  
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label>CVV / CVC *<i class="fal fa-credit-card"></i></label>
                                                                    <input type="text" placeholder="***" value="" data-omise="security_code" size="8"/> 
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <p style="padding-top:20px;">*Three digits number on the back of your card</p>
                                                                </div>
                                                            </div> -->
                                                            <!-- <div class="log-separator fl-wrap"><span>or</span></div> -->
                                                            
                                                            <!-- ราคาค่าห้อง -->
                                                            <input type="hidden" name="price" value="<?php echo $price; ?>">

                                                            <!-- Omise -->
                                                            <input type="hidden" name="omiseToken">
                                                            <input type="hidden" name="omiseSource">  

                                                            <div class="soc-log fl-wrap">
                                                                <p>เลือกการชำระเงิน</p>
                                                                <!-- ปุ่มเลือกการชำระแบบ Omise -->
                                                                <a href="#" id="checkoutButton" class="paypal-log action-button"><i class="fab fa-cc-mastercard"></i>Pay With Mastercard</a>
                                                            </div>
                                                            <!-- <span class="fw-separator"></span> -->
                                                            <a  href="#"  class="previous-form  back-form action-button    color-bg"><i class="fal fa-angle-left"></i>ย้อนกลับ</a>
                                                            <!-- <a  href="#" type="submit" name="submit" class="next-form  action-button btn color2-bg no-shdow-btn">ชำระเงิน<i class="fal fa-angle-right"></i></a> -->
                                                            <!-- <button type="submit" id="checkoutButton" name="submit" class="action-button btn no-shdow-btn color-bg" style="background: #F9B90F;float: right;">จ่ายเงิน<i class="fal fa-angle-right"></i></a> -->
                                                        </fieldset>
                                                        <fieldset class="fl-wrap">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>Confirmation</h3>
                                                            </div>
                                                            <div class="success-table-container">
                                                                <div class="success-table-header fl-wrap">
                                                                    <i class="fal fa-check-circle decsth"></i>
                                                                    <h4>Thank you. Your reservation has been received.</h4>
                                                                    <div class="clearfix"></div>
                                                                    <p>Your payment has been processed successfully.</p>
                                                                    <a href="invoice.html" target="_blank" class="color-bg">View Invoice</a>
                                                                </div>
                                                            </div>
                                                            <span class="fw-separator"></span>
                                                            <a  href="#"  class="previous-form action-button  back-form   color-bg"><i class="fal fa-angle-left"></i> Back</a>
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--   list-single-main-item end -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-widget-item-header">
                                        <h3>ข้อมูลโรงแรม</h3>
                                    </div>
                                    <!--cart-details  --> 
                                    <div class="cart-details fl-wrap">
                                        <!--cart-details_header--> 
                                        <div class="cart-details_header">
                                            <a href="#"  class="widget-posts-img"><img src="images/images_hotel_users/<?php echo $row['picture']; ?>" class="respimg" alt=""></a>
                                            <div class="widget-posts-descr">
                                                <a href="#" title=""><?php echo $row['name_hotel']; ?></a>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"></div>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fas fa-map-marker-alt"></i><?php echo "ต.",$row['sub_area']," อ.",$row['area']," จ.",$row['province']; ?></a></div>
                                            </div>
                                        </div>
                                        <!--cart-details_header end-->       
                                        <!--ccart-details_text-->          
                                        <div class="cart-details_text">
                                            <ul class="cart_list">
                                                <li>Room Type <span><?php echo $type_bed; ?><strong> </strong></span></li>
                                                <li>เข้าพัก : <span><?php echo $bookdates[0]; ?> </span></li>
                                                <li>ออก<span><?php echo $bookdates[1]; ?></span></li>
                                                <li>จำนวนวันที่พัก<span><?php echo $sumday; ?></span></li>
                                                <li>ผู้ใหญ่<span><?php echo $adult; ?></span></li>
                                                <li>เด็ก<span><?php echo $kid; ?></span></li>
                                                <!-- <li>Adults <span>2</span></li>
                                                <li>Childs <span>1 <strong>-10%</strong></span></li>
                                                <li>Taxes And Fees <span><strong>$12</strong></span></li> -->
                                            </ul>
                                        </div>
                                        <!--cart-details_text end --> 
                                    </div>
                                    <!--cart-details end --> 
                                    <!--cart-total --> 
                                    <div class="cart-total">
                                        <span class="cart-total_item_title">รวม</span>
                                        <strong><?php echo $price; ?> บาท</strong>                                
                                    </div>
                                    <!--cart-total end -->                             
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section end -->
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
        <script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>

        <!-- Omise -->
        <script>

            OmiseCard.configure({
                publicKey: "pkey_test_5jhwahj74cgia1vzb3v"
            });

            var button = document.querySelector("#checkoutButton");
            var form = document.querySelector("#checkoutForm");

            button.addEventListener("click", (event) => {
                event.preventDefault();
                OmiseCard.open({
                amount: <?php echo $price*100; ?>,
                currency: "THB",
                defaultPaymentMethod: "credit_card",
                onCreateTokenSuccess: (nonce) => {
                    if (nonce.startsWith("tokn_")) {
                        form.omiseToken.value = nonce;
                    } else {
                        form.omiseSource.value = nonce;
                    };
                    form.submit();
                }
                });
            });

        </script>
    </body>
</html>