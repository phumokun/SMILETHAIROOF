<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM users_add_hotel as addho 
                        INNER JOIN room_in_hotel as inho ON inho.ref_id = addho.ref_id
                    WHERE inho.id = " .$id;

        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result); 

        // echo '<pre>';
        // print_r($row);
        // echo '</pre>';
        // exit();

    }  
?>


<form action="layouts/action-edit-room-db.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="name_hotel" placeholder="กรอกชื่อที่พัก" value="<?php  echo $row['name_hotel']; ?>" readonly/>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>ประเภทที่พัก</label>
                                    <div class="listsearch-input-item">                        
                                        <select data-placeholder="" class="chosen-select no-search-select" name="type_hotel" disabled="true">    
                                            <option><?php echo $row['type_hotel']; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>คำค้นหา<i class="fa fa-key"></i></label>
                                    <input type="text" name="keyword" placeholder="กรุณากรอกคำค้นหาที่พัก เช่น หาดใหญ่,คลองเรียน,บ้านพรุ" value="<?php echo $row['keyword']; ?>" readonly/>
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
                                    <input type="text" name="hotel_number" placeholder="กรอกที่อยู่อยู่ของท่าน" value="<?php echo $row['hotel_number']; ?>" readonly/>
                                </div>
                                <div class="col-md-4">
                                    <label>ซอย<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="land" placeholder="กรอกที่อยู่อยู่ของท่าน" value="<?php echo $row['land']; ?>" readonly/>
                                </div>
                                <div class="col-md-4">
                                    <label>หมู่ที่<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="village_no" placeholder="กรอกที่อยู่อยู่ของท่าน" value="<?php echo $row['village_no']; ?>" readonly/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>ตำบล<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="sub_area" placeholder="กรอกที่อยู่อยู่ของท่าน" value="<?php echo $row['sub_area']; ?>" readonly/>
                                </div>
                                <div class="col-md-4">
                                    <label>อำเภอ<i class="fal fa-map-marker"></i></label>
                                    <input type="text" name="area" placeholder="กรอกที่อยู่อยู่ของท่าน" value="<?php echo $row['area']; ?>" readonly/>
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
                                        <select data-placeholder="City" class="chosen-select no-search-select" name="province" disabled="true">
                                            <option><?php echo $row['province']; ?></option>    
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                            <label>เลขไปรษณีย์<i class="far fa-phone"></i>  </label>
                            <input type="text" name="postal_code" placeholder="กรุณากรอกเลขไปรษณีย์" value="<?php echo $row['postal_code']; ?>" readonly/>
                            <label>หมายเลขติดต่อ<i class="far fa-phone"></i>  </label>
                            <input type="text" name="phone" placeholder="กรอกหมายเลขโทรศัพท์ของท่าน" value="<?php echo $row['phone']; ?>" readonly/>
                            <label>อีเมลล์<i class="far fa-envelope"></i>  </label>
                            <input type="email" name="email" placeholder="กรอกอีเมลล์ของท่าน" value="<?php echo $row['email']; ?>" readonly/>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>ลองติจูด<i class="fal fa-long-arrow-alt-right"></i>  </label>
                                    <input type="text" name="longitude" placeholder="Map Longitude"  id="long" value="<?php echo $row['longitude']; ?>" readonly/>                                                
                                </div>
                                <div class="col-md-6">
                                    <label>ละติจูด<i class="fal fa-long-arrow-alt-down"></i> </label>
                                    <input type="text" name="latitude" placeholder="Map Latitude"  id="lat" value="<?php echo $row['latitude']; ?>" readonly/>                                            
                                </div>
                            </div>
                            <div class="map-container">
                                <div id="singleMap" class="vis-map" data-latitude="7.007789891209252" data-longitude="100.47434807149901"></div>
                            </div>
                        </div>
                    </div>
                                                    
                    <div class="box-widget-item-header">
                        <h3>เกี่ยวกับที่พักของท่าน</h3>
                    </div>
                    <!-- profile-edit-container--> 
                    <div class="profile-edit-container">
                        <div class="custom-form">
                            <label>รายละเอียด</label>
                            <textarea cols="40" rows="3" placeholder="" name="detail_hotel"  readonly><?php echo $row['detail_hotel']; ?></textarea> 
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
                            <ul class="listing-features fl-wrap">

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

                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($result); 

                                ?>

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
                                        <input type="text" name="name_room" placeholder="กรอกชื่อห้องของท่าน" value="<?php echo $row['name_room']; ?>" require/>
                                    </div>
                                    <div class="col-md-4">
                                        <label>ราคา (สำหรับผู้ใหญ่)<i class="fal fa-dollar-sign"></i></label>
                                        <input type="text" name="price_adult" placeholder="บาท" value="<?php echo $row['price_adult']; ?>" require/>
                                    </div>
                                    <div class="col-md-4">
                                        <label>ราคา (สำหรับเด็ก)<i class="fal fa-dollar-sign"></i></label>
                                        <input type="text" name="price_kid" placeholder="บาท" value="<?php echo $row['price_kid']; ?>" require/>
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
                                            <?php } 
                                            
                                                $result = mysqli_query($conn, $query);
                                                $row = mysqli_fetch_array($result); 
                                            
                                            ?>
                                        </div>                                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label>จำนวนห้องพัก<i class="fal fa-warehouse-alt"></i></label>
                                        <input type="text" name="no_bed" placeholder="จำนวน" value="<?php echo $row['no_bed']; ?>" require/>                                                        
                                    </div>
                                </div>
                                <label>รายละเอียดห้อง</label>
                                <textarea cols="40" rows="3" name="detail_room" placeholder=""><?php echo $row['detail_room']; ?></textarea>
                                <div class="profile-edit-container" style="margin-top:30px">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>รูปภาพ</label>
                                            <div class="add-list-media-wrap">
                                                <div class="fuzone">
                                                    <div class="fu-text">
                                                        <span><i class="fal fa-image"></i> Click here or drop files to upload</span>
                                                    </div>
                                                    <input type="file" class="upload" name="picture" accept="image/*">
                                                    <input type="hidden" class="upload" name="picture_old" accept="image/*" value="<?php echo $row['picture']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <!-- Checkboxes -->
                                            <ul class="fl-wrap filter-tags" style="margin-top:24px">
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
                                            <!-- Checkboxes end -->
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
                            <input type="text" name="facebook" placeholder="https://www.facebook.com/" value="<?php echo $row['facebook']; ?>"/>
                            <label>Instagram <i class="fab fa-instagram"></i>  </label>
                            <input type="text" name="instagram" placeholder="https://www.instagram.com/" value="<?php echo $row['instagram']; ?>"/>
                            <button class="btn color2-bg  float-btn" type="submit" name="submit_edit_room">เพิ่มห้องพัก<i class="fal fa-paper-plane"></i></button>
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