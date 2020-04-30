<form action="layouts/action-add-hotel-db.php?id=<?php echo $_SESSION['id']; ?>" method="post" enctype="multipart/form-data">
    <!-- section  -->
    <section class="middle-padding">
        <div class="container">
            <!--dasboard-wrap-->
            <div class="dasboard-wrap fl-wrap">
                <!-- dashboard-content--> 
                <div class="dashboard-content fl-wrap">
                    <div class="box-widget-item-header">
                        <h3>เพิ่มข้อมูลที่พัก</h3>
                    </div>
                    <!-- profile-edit-container--> 
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <label>ชื่อที่พัก<i class="fal fa-briefcase"></i></label>
                            <input type="text" name="name_hotel" placeholder="กรอกชื่อที่พัก" value=""/>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>ประเภทที่พัก</label>
                                    <div class="listsearch-input-item">

                                    <?php
                                        // รับค่า Parameter จาก link เพื่อทำการ Select ข้อมูล
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $type_hotel = "SELECT * FROM type_hotel ORDER BY id ASC";
                                            
                                            // echo $query;
                                            // exit;

                                            // echo '<pre>';
                                            // print_r($row);
                                            // echo '</pre>';
                                            // exit();

                                            // ใช้คำสั่ง While ในการ Query ข้อมูลทั้งหมดของ Id นั้น ๆ
                                            $result = mysqli_query($conn, $type_hotel) 
                                                
                                        ?>
                                        <select data-placeholder="Apartments" class="chosen-select no-search-select" name="type_hotel">
                                            <option>เลือกประเภท</option>
                                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                            <option><?php echo $row['type_hotel']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- profile-edit-container end--> 
                    <div class="box-widget-item-header">
                        <h3>ตำแหน่งที่ตั้ง</h3>
                    </div>
                    <!-- profile-edit-container--> 
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>บ้านเลขที่<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="hotel_number" placeholder="กรอกที่อยู่อยู่ของท่าน" value="" require/>
                                </div>
                                <div class="col-md-4">
                                    <label>ซอย<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="land" placeholder="กรอกที่อยู่อยู่ของท่าน" value="" require/>
                                </div>
                                <div class="col-md-4">
                                    <label>หมู่ที่<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="village_no" placeholder="กรอกที่อยู่อยู่ของท่าน" value="" require/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>ตำบล<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="sub_area" placeholder="กรอกที่อยู่อยู่ของท่าน" value="" require/>
                                </div>
                                <div class="col-md-4">
                                    <label>อำเภอ<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="area" placeholder="กรอกที่อยู่อยู่ของท่าน" value="" require/>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-list-search-input-item in-loc-dec fl-wrap not-vis-arrow">
                                        <label>จังหวัด</label>
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="City" class="chosen-select" name="province">
                                                <?php include('layouts/option-city.php'); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <label>จังหวัด</label>
                                    <div class="listsearch-input-item">
                                        <select data-placeholder="City" class="chosen-select no-search-select" name="province" require>
                                            <?php include('layouts/option-city.php'); ?>  
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                            <label>เลขไปรษณีย์<i class="far fa-phone"></i>  </label>
                            <input type="text" name="postal_code" placeholder="กรุณากรอกเลขไปรษณีย์" value="" require/>
                            <label>หมายเลขติดต่อ<i class="far fa-phone"></i>  </label>
                            <input type="text" name="phone" placeholder="กรอกหมายเลขโทรศัพท์ของท่าน" value="" require/>
                            <label>อีเมลล์<i class="far fa-envelope"></i>  </label>
                            <input type="email" name="email" placeholder="กรอกอีเมลล์ของท่าน" value="" require/>
                        </div>
                    </div>
                                                    
                    <div class="box-widget-item-header">
                        <h3>เกี่ยวกับที่พักของท่าน</h3>
                    </div>
                    <!-- profile-edit-container--> 
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <label>รายละเอียด</label>
                            <textarea cols="40" rows="3" placeholder="" name="detail_hotel"></textarea> 
                        </div>
                    </div>
                
                    <!-- profile-edit-container end-->                                        
                    <div class="box-widget-item-header mat-top">
                        <h3>สิ่งอำนวยความสะดวก</h3>
                    </div>
                    <!-- profile-edit-container--> 
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <!-- Checkboxes -->
                            <ul class="fl-wrap filter-tags">
                                <li>
                                    <input id="check-aaa5" type="checkbox" name="option_hotel[]" value="ฟรี WiFi">
                                    <label for="check-aaa5">ฟรี WiFi</label>
                                </li>
                                <li>
                                    <input id="check-bb5" type="checkbox" name="option_hotel[]" value="ที่จอดรถ">
                                    <label for="check-bb5">ที่จอดรถ</label>
                                </li>
                                <li>                                       
                                    <input id="check-dd5" type="checkbox" name="option_hotel[]" value="ฟิตเนส">
                                    <label for="check-dd5">ฟิตเนส</label>
                                </li>
                                <li>                                          
                                    <input id="check-cc5" type="checkbox" name="option_hotel[]" value="ใกล้สนามบิน">
                                    <label for="check-cc5">ใกล้สนามบิน</label>
                                </li>
                                <li>                                       
                                    <input id="check-ff5" type="checkbox" name="option_hotel[]" value="มีโซนสูบบุหรี่">
                                    <label for="check-ff5">มีโซนสูบบุหรี่</label>
                                </li>
                            </ul>
                            <!-- Checkboxes end -->
                        </div>
                    </div>
                    <!-- profile-edit-container end-->  
                                                                    
                    
                                                            
                    <div class="box-widget-item-header mat-top">
                        <h3>ห้องพัก</h3>
                    </div>
                    <!-- profile-edit-container--> 
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <div class="room-add-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>ชื่อห้องพัก<i class="fal fa-warehouse-alt"></i></label>
                                        <input type="text" name="name_room" placeholder="กรอกชื่อห้องของท่าน" value="" require/>
                                    </div>
                                    <div class="col-md-4">
                                        <label>ราคา<i class="fal fa-dollar-sign"></i></label>
                                        <input type="text" name="price_room" placeholder="บาท" value="" require/>
                                    </div>
                                    <div class="col-md-2">
                                        <label>จำกัดห้องละ (ผู้ใหญ่)<i class="fal fa-dollar-sign"></i></label>
                                        <div class="quantity-item">
                                            <div class="quantity">
                                                <input type="number" name="num_adult" min="1" max="5" step="1" value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>จำกัดห้องละ (เด็ก)<i class="fal fa-dollar-sign"></i></label>
                                        <div class="quantity-item">
                                            <div class="quantity">
                                                <input type="number" name="num_kid" min="1" max="5" step="1" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>ประเภทห้อง<i class="fal fa-briefcase"></i></label>
                                        <div class="listsearch-input-item">
                                        
                                        <?php
                                        // รับค่า Parameter จาก link เพื่อทำการ Select ข้อมูล
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $type_bed = "SELECT * FROM type_bed ORDER BY id ASC";
                                            
                                            // echo $query;
                                            // exit;

                                            // echo '<pre>';
                                            // print_r($row);
                                            // echo '</pre>';
                                            // exit();

                                            // ใช้คำสั่ง While ในการ Query ข้อมูลทั้งหมดของ Id นั้น ๆ
                                            $result = mysqli_query($conn, $type_bed) 
                                                
                                        ?>
                                            <select data-placeholder="Apartments" class="chosen-select no-search-select" name="type_bed">
                                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                    <option value="<?php echo $row['type_bed']; ?>"><?php echo $row['type_bed']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php } ?>
                                        </div>                                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label>จำนวนห้องพัก<i class="fal fa-warehouse-alt"></i></label>
                                        <input type="text" name="no_bed" placeholder="จำนวน" value="" require/>                                                        
                                    </div>
                                </div>
                                <label>รายละเอียดห้อง</label>
                                <textarea cols="40" rows="3" name="detail_room" placeholder=""></textarea>
                                <div class="profile-edit-container" style="margin-top:30px">
                                    <div class="row">                        
                                        <div class="col-md-12">
                                            <label>สิ่งอำนวยความสะดวกภายในห้อง</label>
                                            <!-- Checkboxes -->
                                            <ul class="fl-wrap filter-tags" style="margin-top:16px; margin-left:13px">
                                                <li>
                                                    <input id="check-aaa51" type="checkbox" name="option_room[]" value="ฟรี WiFi">
                                                    <label for="check-aaa51">ฟรี WiFi</label>
                                                </li>
                                                <li>
                                                    <input id="check-bb51" type="checkbox" name="option_room[]" value="ตู้นิรภัย">
                                                    <label for="check-bb51">ตู้นิรภัย</label>
                                                </li>
                                                <li>                                       
                                                    <input id="check-dd51" type="checkbox" name="option_room[]" value="เครื่องปรับอากาศ">
                                                    <label for="check-dd51">เครื่องปรับอากาศ</label>
                                                </li>
                                                <li>                                          
                                                    <input id="check-cc51" type="checkbox" name="option_room[]" value="ทีวี">
                                                    <label for="check-cc51">ทีวี</label>
                                                </li>
                                                <li>                                       
                                                    <input id="check-ff51" type="checkbox" name="option_room[]" value="อาหารเช้า">
                                                    <label for="check-ff51">อาหารเช้า</label>
                                                </li>
                                                <li>
                                                    <input id="check-bb51" type="checkbox" name="option_room[]" value="ห้องน้ำ">
                                                    <label for="check-bb51">ห้องน้ำ</label>
                                                </li>
                                                <li>
                                                    <input id="check-bb51" type="checkbox" name="option_room[]" value="ผ้าขนหนู">
                                                    <label for="check-bb51">ผ้าขนหนู</label>
                                                </li>
                                                <li>
                                                    <input id="check-bb51" type="checkbox" name="option_room[]" value="แชมพูสระผม สบู่ร่างกาย">
                                                    <label for="check-bb51">แชมพูสระผม สบู่ร่างกาย</label>
                                                </li>
                                                <li>
                                                    <input id="check-bb51" type="checkbox" name="option_room[]" value="เครื่องเป่าผม">
                                                    <label for="check-bb51">เครื่องเป่าผม</label>
                                                </li>
                                                <li>
                                                    <input id="check-bb51" type="checkbox" name="option_room[]" value="เครื่องหนีบผม">
                                                    <label for="check-bb51">เครื่องหนีบผม</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Checkboxes end -->
                                        <div class="col-md-12 mat-top">
                                            <div class="box-widget-item-header">
                                                <h3>รูปภาพ</h3>
                                            </div>
                                            <div class="add-list-media-wrap">
                                                <div class="fuzone">
                                                    <div class="row">
                                                        <div id="uploaded_images"></div>
                                                    </div>
                                                    <div id="select_file">
                                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                                        <span class="btn color2-bg  float-btn" style="float:none;">
                                                        <i class="fal fa-paper-plane"></i>
                                                        <span>เพิ่มรูปห้องพัก</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload" type="file" name="files" accept="image/x-png, image/gif, image/jpeg" >
                                                        </span>
                                                        <br>
                                                        <br>
                                                        <!-- The global progress bar -->
                                                        <!-- <div id="progress" class="progress">
                                                            <div class="progress-bar progress-bar-success"></div>
                                                        </div> -->
                                                        <!-- The container for the uploaded files -->
                                                        <div id="files" class="files"></div>
                                                        <input type="text" name="picture_main" id="uploaded_file_name" hidden>
                                                        <br>
                                                    </div>
                                                    <!-- <div class="fu-text">
                                                        <span><i class="fal fa-image"></i> Click here or drop files to upload</span>
                                                    </div>
                                                    <input type="file" class="upload" name="picture" accept="image/*"> -->
                                                </div>
                                                <label>***รูปสุดท้ายจะเป็นรูปหน้าปก</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <span class="add-button color-bg">เพิ่มห้องพัก + </span> -->
                    </div>
                    <!-- profile-edit-container end-->                                             
                                                    
                    <div class="box-widget-item-header mat-top">
                        <h3>ช่องทางการติดตาม</h3>
                    </div>
                    <!-- profile-edit-container--> 
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <label>Facebook <i class="fab fa-facebook"></i></label>
                            <input type="text" name="facebook" placeholder="https://www.facebook.com/" value=""/>
                            <label>Instagram <i class="fab fa-instagram"></i>  </label>
                            <input type="text" name="instagram" placeholder="https://www.instagram.com/" value=""/>
                            <button class="btn color2-bg  float-btn" type="submit" name="submit_add_hotel">เพิ่มห้องพัก<i class="fal fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <!-- profile-edit-container end-->                                
                </div>
                <!-- dashboard-list-box end--> 
            </div>
            <!-- dasboard-wrap end-->
        </div>
    </section>
</form>