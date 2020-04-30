<form action="layouts/action-edit-profile-db.php?id=<?php echo $_SESSION['id']; ?>" method="post" enctype="multipart/form-data">
    <div class="dasboard-wrap fl-wrap">
        <div class="box-widget-item-header">
            <h3>ประวัติ</h3>
        </div>
        <!-- profile-edit-container--> 
        <div class="profile-edit-container">
            <div class="custom-form">
                <label>ชื่อ-สกุล<i class="far fa-user"></i></label>
                <input name="name" type="text" placeholder="ชื่อ" value="<?php echo $row['name']; ?>"/>
                <label>อีเมลล์<i class="far fa-envelope"></i>  </label>
                <input name="email" type="text" placeholder="" value="<?php echo $row['email']; ?>" readonly/>
                <label>หมายเลขโทรศัพท์<i class="far fa-phone"></i>  </label>
                <input name="phone" type="text" placeholder="หมายเลขมือถือของท่าน" value="<?php echo $row["phone_user"]?>"/>
                <label>ที่อยู่<i class="fas fa-map-marker"></i>  </label>
                <input name="address" type="text" placeholder="ที่อยู่" value="<?php echo $row['address']; ?>"/>
                <div class="row">
                    <div class="col-sm-9">
                        <label>โน้ต</label>                                              
                        <textarea cols="40" rows="3" placeholder="เกี่ยวกับตัวคุณ" name="about_me"><?php echo $row['about_me']; ?></textarea>                                                    
                    </div>
                    <div class="col-sm-3">
                        <label>เปลี่ยนรูปโปรไฟล์</label> 
                        <div class="add-list-media-wrap">
                            <div class="fuzone">
                                <div class="fu-text">
                                    <span><i class="fal fa-image"></i>คลิกเพื่อเปลี่ยนรูปภาพ</span>
                                </div>
                                <input class="upload" type="file" name="avatar_upload" accept="image/*" />
                                <input class="upload" type="hidden" name="avatar_old" id="upload" value="<?php echo $row['picture_users']; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-widget-item-header mat-top">
        <h3>โซเซียล</h3>
        </div>
        <!-- profile-edit-container--> 
        <div class="profile-edit-container">
        <div class="custom-form">
            <label>Facebook <i class="fab fa-facebook"></i></label>
            <input type="text" name="facebook" placeholder="https://www.facebook.com/" value="<?php echo $row['facebook']; ?>"/>
            <label>Twitter<i class="fab fa-twitter"></i>  </label>
            <input type="text" name="twitter" placeholder="https://twitter.com/" value="<?php echo $row['twitter']; ?>"/>
            <label> Instagram <i class="fab fa-instagram"></i>  </label>
            <input type="text" name="instagram" placeholder="https://www.instagram.com/" value="<?php echo $row['instagram']; ?>"/>
            <button class="btn color2-bg float-btn" name="save_change">บันทึก<i class="fal fa-save"></i></button>
        </div>
        </div>
        <!-- profile-edit-container end-->    
    </div>
</form>                          
                                        
                                        