<div class="dashboard-list">
    <div class="dashboard-message">
        <span class="new-dashboard-item">New</span>
        <div class="dashboard-message-avatar">
            <img src="images/img_users/<?php echo $row['picture_users']; ?>" alt="">
        </div>
        <div class="dashboard-message-text">
            <h4><?php echo $row['name']; ?> - <span><?php echo $row['create_date']; ?></span></h4>
            <div class="booking-details fl-wrap">
                <span class="booking-title">ประเภทห้อง :</span>   
                <span class="booking-text"><?php echo $row['type_bed']; ?></span>
            </div>
            <div class="booking-details fl-wrap">
                <span class="booking-title">จำนวนผู้เข้าพัก :</span>   
                <span class="booking-text">ผู้ใหญ่ : <?php echo $row['adult']; ?> คน ; เด็ก : <?php echo $row['kid']; ?></span>
            </div>
            <div class="booking-details fl-wrap">
                <span class="booking-title">วันที่เข้าพัก :</span>   
                <span class="booking-text"><?php echo $row['bkin']; ?>  - <?php echo $row['bkout']; ?> รวม : <?php echo $row['sumday'];?> วัน </span>
            </div>
            <div class="booking-details fl-wrap">
                <span class="booking-title">รวมราคา :</span>   
                <span class="booking-text"><?php echo $row['price'];?> บาท</span>
            </div>
            <div class="booking-details fl-wrap">                                                               
                <span class="booking-title">อีเมลล์โรงแรม :</span>  
                <span class="booking-text"><a href="#" target="_top"><?php echo $row['email_hotel']; ?></a></span>
            </div>
            <div class="booking-details fl-wrap">
                <span class="booking-title">เบอร์โทรโรงแรม :</span>   
                <span class="booking-text"><a href="tel:+496170961709" target="_top"><?php echo $row['phone_hotel']; ?></a></span>
            </div>
            <div class="booking-details fl-wrap">
                <span class="booking-title">ชำระเงินด้วย :</span> 
                <span class="booking-text"> <strong class="done-paid"><?php echo $row['status_pay']; ?>  </strong> ด้วย <?php echo $row['payment']; ?></span>
            </div>
            <div class="booking-details fl-wrap">
                <?php 
                    $status = $row['status'];
                    if ($status='CheckIn'){
                        $status='เข้าพัก';
                    } 
                ?>
                <span class="booking-title">สถานะ :</span> 
                <span class="booking-text"><a><?php echo $status; ?></a></span>
            </div>
            <div class="booking-details fl-wrap">
                <ul class="dashboard-listing-table-opt  fl-wrap">
                    <!-- ทำปุ่ม Cheack in , cheack out -->
                    <!-- refr คือ ref_room -->
                    <li><a href="layouts/action-checkout-room.php?id=<?php echo $row['id_bk']; ?>&refr=<?php echo $row['ref_room']; ?>" class="del-btn">Check Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>