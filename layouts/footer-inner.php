<div class="footer-inner">
    <div class="container">
        <!--footer-fw-widget-->
        <!--footer-fw-widget end-->
        <div class="row">
            <!--footer-widget -->
            <div class="col-md-4">
                <div class="footer-widget fl-wrap">
                    <h3>เกี่ยวกับ</h3>
                    <div class="footer-contacts-widget fl-wrap">
                        <p>Website SMRT หรือ SMAILTHAIROOF ให้บริการเกี่ยวกับการจองที่พักทุกประเภทที่ทางเรารับประกันว่าสามารถพักผ่อนได้เพื่อเปิดประสบการณ์ใหม่ๆให้ผู้คนทุกระดับทุกประเภท</p>
                        <ul  class="footer-contacts fl-wrap">
                            <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#" target="_blank">Suppasan@hotmail.com</a></li>
                            <li> <span><i class="fal fa-map-marker-alt"></i> Adress :</span><a href="#" target="_blank">Thailand Songkha Hatyai 90110</a></li>
                            <li><span><i class="fal fa-phone"></i> Phone :</span><a href="#">(+66)9428455</a></li>
                        </ul>
                        <div class="footer-social">
                            <span>ติดต่อเราได้ที่ : </span>
                            <ul>
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-widget end-->
            <!--footer-widget -->
            <div class="col-md-4">
                <div class="footer-widget fl-wrap">

                    <?php 

                    $query = "SELECT * FROM users_add_hotel as addho 
                                    INNER JOIN room_in_hotel as inho ON inho.ref_id = addho.ref_id
                                WHERE addho.status_hotel = 'ผ่านการตรวจสอบ' 
                                GROUP BY addho.ref_id";

                    $result = mysqli_query($conn, $query); 


                    ?>

                    <h3>โรงแรมที่ลงทะเบียนล่าสุด</h3>
                    <div class="widget-posts fl-wrap">
                        <ul>
                            <!-- กำหนดให้หยุด while loop -->
                            <?php 
                            $i=1;
                            while ($row = mysqli_fetch_array($result)) { 
                                
                            ?>
                            <li class="clearfix">
                                <a href="listing-single.php?id=<?php echo $row['ref_id']; ?>"  class="widget-posts-img"><img src="images/images_hotel_users/<?php echo $row['picture']; ?>" class="respimg" alt=""></a>
                                <div class="widget-posts-descr">
                                    <a href="listing-single.php?id=<?php echo $row['ref_id']; ?>" title=""><?php echo $row['name_hotel']; ?></a>
                                    <span class="widget-posts-date"><?php echo $row['create_date']; ?></span>
                                </div>
                            </li>
                            <?php 
                                if($i>=2) {
                                    break;
                                    $i++;
                                }
                            } 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!--footer-widget end-->
            <!--footer-widget -->
            <div class="col-md-4">
                <div class="footer-widget fl-wrap">
                    <h3>ข่าวสารบน Twitter</h3>
                    <div id="footer-twiit" class="fl-wrap"></div>
                    <a href="#" class="twitter-link" target="_blank">ติดตาม</a>
                </div>
            </div>
            <!--footer-widget end-->
        </div>
        <div class="clearfix"></div>
        <!--footer-widget -->
        <div class="footer-widget">
            <div class="row">
                <!-- contacts.html -->
                <div class="col-md-4"><a class="contact-btn color-bg" href="#">Get In Touch <i class="fal fa-envelope"></i></i></a></div>
                <div class="col-md-8">
                    <div class="customer-support-widget fl-wrap">
                        <h4>Customer support : </h4>
                        <a href="tel:+669428455" class="cs-mumber">(+66)9428455</a>
                        <a href="tel:+669428455" class="cs-mumber-button color2-bg">Call Now <i class="far fa-phone-volume"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-widget end -->
    </div>
</div>