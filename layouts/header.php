<header class="main-header">
    <!-- header-top-->
    <div class="header-top fl-wrap">
        <div class="container">
            <div class="logo-holder">
                <a><img src="images/logo1.png" alt=""></a>
            </div>
            <!-- dashboard-add-listing.php -->
            <!-- ใช้ If check เพื่อให้ลิงค์ส่งไปหน้าที่กำหนด -->
            <?php if (isset($_SESSION['email'])) {?>
                <a href="dashboard-add-listing.php?id=<?php echo $_SESSION['id']; ?>" class="add-hotel">ลงทะเบียนที่พักของท่าน<span><i class="far fa-plus"></i></span></a>
            <?php } else { ?>
                <a href="dashboard-add-listing.php" class="add-hotel">ลงทะเบียนที่พักของท่าน<span><i class="far fa-plus"></i></span></a>
            <?php } ?>

            <!-- สำหรับต้องการเปลี่ยนภาษาทำตรงนี้ -->
            <div class="lang-wrap">
            <!-- ใน i ถ้าต้องการให้มีปุ่มแสดง dropdown ใช้ fa fa-caret-down -->
                <div class="show-lang"><img src="images/lan/7.png" alt=""> <span>TH</span><i class=""></i></div>
                <!-- <ul class="lang-tooltip green-bg">
                    <li><a href="#"><img src="images/lan/7.png" alt="">TH</a></li>
                </ul> -->
            </div>
        </div>
    </div>
    <!-- header-top end-->
    <!-- header-inner-->
    <div class="header-inner fl-wrap">
        <div class="container">
            <div class="show-search-button"><span>ค้นหา</span> <i class="fas fa-search"></i> </div>
            <div class="header-user-menu">

                <!-- PHP login -->
                <!-- การใช้ If Check เพื่อแสดงผล Sing In หรือ ชื่อผู้ใช้งานได้ -->
                <?php if (isset($_SESSION['email'])) {?>
                <div class="header-user-name">
                    <!-- ถ้า Login เข้ามาแล้วจะใช้รูปของแต่ละคน แต่ถ้าสมัครครั้งแรกจะใช้รูปที่เว็บตั้งไว้ -->
                    <?php if (isset($_SESSION['picture_users']) == NULL)  { ?>
                        <span><img src="images/avatar/1.jpg" alt=""></span>
                    <?php } else { ?>
                        <span><img src="images/img_users/<?php echo $_SESSION['picture_users']; ?>" alt=""></span>
                    <?php } ?>
                    <!-- ตามด้วยชื่อผู้ใช้ -->
                    <?php echo $_SESSION['name']; ?>
                </div>
                <!-- Dropdown เมนู -->
                <ul>
                    <li><a href="dashboard-myprofile.php?id=<?php echo $_SESSION['id']; ?>">โปรไฟล์</a></li>
                    <li><a href="dashboard-listing-table.php?id=<?php echo $_SESSION['id']; ?>">รายการที่พัก</a></li>
                    <li><a href="dashboard-bookings.php?id=<?php echo $_SESSION['id']; ?>">ประวัติการจอง</a></li> 
                    <li><a href="logout.php">ออกจากระบบ</a></li>
                </ul>
                <!-- ถ้ายังไมทา Sign in จะแสดงปุ่ม -->
                <?php } else {?>
                <div class="header-user-name modal-open">
                    <span><img src="images/avatar/1.jpg" alt=""></span>
                    <span class="show-reg-form "></span>Sign In
                </div>
                <?php } ?>
                <!-- END PHP login -->

            </div>
            <div class="home-btn"><a href="index.php?id=<?php echo $_SESSION['id']; ?>"><i class="fas fa-home"></i></a></div>
            <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">
                <nav>
                    <ul>
                        <li>
                            <a href="#" class="act-link">ที่พัก<i class="fas fa-caret-down"></i></a>
                        </li>
                        <!-- <li>
                            <a href="#">รีวิว<i class="fas fa-caret-down"></i></a> -->
                            <!--second level -->
                            <!-- <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="author-single.html">User single</a></li>
                                <li><a href="help.html">Help FAQ</a></li>
                                <li><a href="pricing-tables.html">Pricing</a></li>
                                <li><a href="booking-single.html">Booking</a></li>
                                <li><a href="dashboard.html">User Dashboard</a></li>
                                <li><a href="blog2.html">Blog Classik</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                                <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul> -->
                            <!--second level end-->
                        <!-- </li> -->
                    </ul>
                </nav>
            </div>
            <!-- navigation  end -->
            <!-- wishlist-wrap-->            
            <!-- wishlist-wrap end--> 
        </div>
    </div>
    <!-- header-inner end-->
    <!-- header-search -->
    <div class="header-search vis-search">
        <div class="container">
        <!-- การค้นหา -->
            <form action="listing2.php?act=search" method="post">
                <div class="row">
                    <!-- header-search-input-item -->
                    <div class="col-sm-4">
                        <div class="col-list-search-input-item in-loc-dec fl-wrap not-vis-arrow">
                            <label>เมืองที่พัก</label>
                            <div class="listsearch-input-item">
                                <select data-placeholder="City" class="chosen-select" name="location">
                                    <?php include('layouts/option-city.php'); ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="header-search-input-item fl-wrap location autocomplete-container">
                            <label>เมื่องที่ต้องการพัก</label>
                            <span class="header-search-input-item-icon"><i class="fal fa-map-marker-alt"></i></span>
                            <input type="text" name="lacation" placeholder="เมืองที่พัก" class="autocomplete-input" id="autocompleteid" value="" require/>
                            <a href="#"><i class="fal fa-dot-circle"></i></a>
                        </div> -->
                    </div>
                    <!-- header-search-input-item end -->
                    <!-- header-search-input-item -->
                    <div class="col-sm-3">
                        <div class="header-search-input-item fl-wrap date-parent">
                            <label>วันที่ เข้า-ออก</label>
                            <span class="header-search-input-item-icon"><i class="fal fa-calendar-check"></i></span>
                            <input type="text" placeholder="วันที่ต้องการพัก" name="header-search" value=""/>
                        </div>
                    </div>
                    <!-- header-search-input-item end -->                             
                    <!-- header-search-input-item -->
                    <div class="col-sm-3">
                        <div class="header-search-input-item fl-wrap">
                            <div class="quantity-item">
                                <label>ห้อง</label>
                                <div class="quantity">
                                    <input type="number" name="sum_room" min="1" max="3" step="1" value="1">
                                </div>
                            </div>
                            <div class="quantity-item">
                                <label>ผู้ใหญ่</label>
                                <div class="quantity">
                                    <input type="number" name="adult" min="1" max="3" step="1" value="1">
                                </div>
                            </div>
                            <div class="quantity-item">
                                <label>เด็ก</label>
                                <div class="quantity">
                                    <input type="number"  min="0" max="3" step="1" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- header-search-input-item end -->                             
                    <!-- header-search-input-item -->
                    <div class="col-sm-2">
                        <div class="header-search-input-item fl-wrap">
                            <button name="search" class="header-search-button">ค้นหา<i class="far fa-search"></i></button>
                        </div>
                    </div>
                    <!-- header-search-input-item end -->                                                          
                </div>
            </form>
        </div>
        <div class="close-header-search"><i class="fal fa-angle-double-up"></i></div>
    </div>
    <!-- header-search  end -->
</header>