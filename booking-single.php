<?php 

    session_start();
    // session_destroy();

    include_once 'connectdb.php';

    $id_hotel = $_GET['act'];
    $id_host = $_GET['id'];

    // echo '<pre>';
    // print_r ($_GET);
    // echo '</pre>';
    // exit(); 

    if (isset($_POST['submit'])) {

        $type_bed = $_POST['repopt'];
        $bookdates = explode( " - ",$_POST['bookdates']);
        $sumday = $_POST['qty5'];

        // echo $bookdates[1];
        // exit(); 
        
        $query = "SELECT * FROM room_in_hotel as inho
                        INNER JOIN users_add_hotel as addho ON addho.ref_id = inho.ref_id
                    WHERE addho.ref_id = $id_host
                    GROUP BY inho.ref_id";

        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result); 

        
    }

    // echo $query;
    // exit();

    // $bookdates = explode( " - ",$_POST['bookdates']);

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
                                            <li class="active"><span>01.</span>Personal Info</li>
                                            <li><span>02.</span>Billing Address</li>
                                            <li><span>03.</span>Payment Method</li>
                                            <li><span>04.</span>Confirm</li>
                                        </ul> -->
                                        <!--   list-single-main-item -->
                                        <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                                            <div class="profile-edit-container">
                                                <div class="custom-form">
                                                    <form action="layouts/action-booking-room.php" method="post">
                                                        <fieldset class="fl-wrap">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>ข้อมูลผู้จองที่พัก</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>ชื่อ - สกุล ผู้จอง<i class="far fa-user"></i></label>
                                                                    <input type="text" name="name_user" placeholder="Your Name" value="<?php echo $_SESSION['name']; ?>"/>                                                  
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>E-mail<i class="far fa-envelope"></i>  </label>
                                                                    <input type="text" name="email" placeholder="yourmail@domain.com" value="<?php echo $_SESSION['email']; ?>"/>                                                  
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>เบอร์โทร<i class="far fa-phone"></i>  </label>
                                                                    <input type="text" name="phone" placeholder="87945612233" value="<?php echo $_SESSION['phone_user']; ?>"/>
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


                                                            <input type="hidden" name="type_bed" placeholder="87945612233" value="<?php echo $type_bed; ?>"/>
                                                            <input type="hidden" name="in" placeholder="87945612233" value="<?php echo $bookdates[0]; ?>"/>
                                                            <input type="hidden" name="out" placeholder="87945612233" value="<?php echo $bookdates[1]; ?>"/>
                                                           
                                                            <input type="hidden" name="id_host" placeholder="87945612233" value="<?php echo $id_host; ?>"/>
                                                            
                                                            <!-- <a  href="#"  class="next-form action-button btn no-shdow-btn color-bg">Billing Address <i class="fal fa-angle-right"></i></a> -->
                                                            <button type="submit" name="submit" class="action-button btn no-shdow-btn color-bg">จองที่พัก<i class="fal fa-angle-right"></i></a>
                                                        </fieldset>
                                                        <fieldset class="fl-wrap">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>Billing Address</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>City <i class="fal fa-globe-asia"></i></label>
                                                                    <input type="text" placeholder="Your city" value=""/>                                                  
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>Country </label>
                                                                    <div class="listsearch-input-item ">
                                                                        <select data-placeholder="Your Country" class="chosen-select no-search-select" >
                                                                            <option>United states</option>
                                                                            <option>Asia</option>
                                                                            <option>Australia</option>
                                                                            <option>Europe</option>
                                                                            <option>South America</option>
                                                                            <option>Africa</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label>Street <i class="fal fa-road"></i> </label>
                                                                    <input type="text" placeholder="Your Street" value=""/>                                                  
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <label>State<i class="fal fa-street-view"></i></label>
                                                                    <input type="text" placeholder="Your State" value=""/>                                                  
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label>Postal code<i class="fal fa-barcode"></i> </label>
                                                                    <input type="text" placeholder="123456" value=""/>
                                                                </div>
                                                            </div>
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>Addtional Notes</h3>
                                                            </div>
                                                            <textarea cols="40" rows="3" placeholder="Notes"></textarea>
                                                            <span class="fw-separator"></span>
                                                            <a  href="#"  class="previous-form action-button back-form   color-bg"><i class="fal fa-angle-left"></i> Back</a>
                                                            <a  href="#"  class="next-form back-form action-button btn no-shdow-btn color-bg">Payment Step <i class="fal fa-angle-right"></i></a>
                                                        </fieldset>
                                                        <fieldset class="fl-wrap">
                                                            <div class="list-single-main-item-title fl-wrap">
                                                                <h3>Payment method</h3>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <label>Cardholder's Name<i class="far fa-user"></i></label>
                                                                    <input type="text" placeholder="" value="Adam Kowalsky"/>                                                  
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label>Card Number <i class="fal fa-credit-card-front"></i></label>
                                                                    <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" value=""/> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <label>Expiry Month<i class="fal fa-calendar"></i></label>
                                                                    <input type="text" placeholder="MM" value=""/>                                                  
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label>Expiry Year<i class="fal fa-calendar"></i></label>
                                                                    <input type="text" placeholder="YY" value=""/>                                                  
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <label>CVV / CVC *<i class="fal fa-credit-card"></i></label>
                                                                    <input type="password" placeholder="***" value=""/> 
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <p style="padding-top:20px;">*Three digits number on the back of your card</p>
                                                                </div>
                                                            </div>
                                                            <div class="log-separator fl-wrap"><span>or</span></div>
                                                            <div class="soc-log fl-wrap">
                                                                <p>Select Other Payment Method</p>
                                                                <a href="#" class="paypal-log"><i class="fab fa-paypal"></i>Pay With Paypal</a>
                                                            </div>
                                                            <span class="fw-separator"></span>
                                                            <a  href="#"  class="previous-form  back-form action-button    color-bg"><i class="fal fa-angle-left"></i> Back</a>
                                                            <a  href="#"  class="next-form  action-button btn color2-bg no-shdow-btn">Confirm and Pay<i class="fal fa-angle-right"></i></a>                                               
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
                                            <a href="#"  class="widget-posts-img"><img src="images/city/<?php echo $row['picture']; ?>" class="respimg" alt=""></a>
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
                                        <strong>บาท</strong>                                
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
    </body>
</html>