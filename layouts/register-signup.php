<div class="main-register-wrap modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder">
        <div class="main-register fl-wrap">
            <div class="close-reg color-bg"><i class="fal fa-times"></i></div>
            <ul class="tabs-menu">
                <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i>เข้าสู่ระบบ</a></li>
                <li><a href="#tab-2"><i class="fal fa-user-plus"></i>สมัครสมาชิก</a></li>
            </ul>
            <!--tabs -->                       
            <div id="tabs-container">
                <div class="tab">
                    <!--tab -->
                    <div id="tab-1" class="tab-content">

                        <!-- <span>SMILE<strong>Book</strong></span> -->

                        <!-- Login -->
                        <div class="custom-form">
                            <form action="layouts/action-login-db.php" method="post" enctype="multipart/form-data" name="registerform">
                                <label>อีเมลล์<span>*</span> </label>
                                <input name="email" type="email"   onClick="this.select()" value="">
                                <label>พาสเวิร์ด<span>*</span> </label>
                                <input name="password" type="password"   onClick="this.select()" value="" >
                                <button type="submit" name="submit_login" class="log-submit-btn color-bg"><span>เข้าสู่ระบบ</span></button>
                                <div class="clearfix"></div>

                                <!-- <div class="filter-tags">
                                    <input id="check-a" type="checkbox" name="check">
                                    <label for="check-a">Remember me</label>
                                </div> -->

                            </form>

                            <!-- <div class="lost_password">
                                <a href="#">Lost Your Password?</a>
                            </div> -->

                        </div>
                    </div>
                    <!--tab end -->
                    <!--tab -->
                    <div class="tab">
                        <div id="tab-2" class="tab-content">

                            <!-- <span>SMILE<strong>Book</strong></span> -->

                            <!-- Sign Up  -->
                            <div class="custom-form">
                                <form action="layouts/action-signup-db.php" method="post" enctype="multipart/form-data" name="registerform" class="main-register-form" id="main-register-form2">
                                    <label>ชื่อ-สกุล<span>*</span> </label>
                                    <input name="name" type="text"   onClick="this.select()" value="" required>
                                    <label>อีเมลล์<span>*</span></label>
                                    <input name="email" type="email"  onClick="this.select()" value="" required>
                                    <label>พาสเวิร์ด<span>*</span></label>
                                    <input name="password" id="password" type="password" onClick="this.select()" value="" minlength="6" required style="margin-bottom:10px">
                                    <p style="text-align:left ; font-size:12px">ความปลอดภัยของรหัส : <span id="result"> </span></p>
                                    <label>ยืนยันพาสเวิร์ด</span> </label>
                                    <input name="con_password" id="con_password" type="password"   onClick="this.select()" value="" minlength="6" required>
                                    <button type="submit" name="submit_register" class="log-submit-btn color-bg"  ><span>สมัครสมาชิก</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                </div>
                <!--tabs end -->

                <!-- <div class="log-separator fl-wrap"><span>or</span></div>
                <div class="soc-log fl-wrap">
                    <p>For faster login or register use your social account.</p>
                    <a href="#" class="facebook-log"><i class="fab fa-facebook-f"></i>Connect with Facebook</a>
                </div> -->
                
            </div>
        </div>
    </div>
</div>