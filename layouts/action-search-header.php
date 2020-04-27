<!-- list-main-wrap-->
<div class="list-main-wrap fl-wrap card-listing">

<?php 

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();

$bookdates = explode( " - ",$_POST['bookdates']);
$num_adult  = $_POST['num_adult'];
$num_kid  = $_POST['num_kid'];

if(isset($_POST['search'])){

    $location = $_POST['location'];

    $countbk = "SELECT *,COUNT(bk.ref_room) as crfr FROM books as bk 
                    INNER JOIN room_in_hotel as inho ON inho.id_room = bk.ref_room 
                WHERE (bk.bkin BETWEEN '$bookdates[0]' AND '$bookdates[1]') OR (bk.bkout BETWEEN '$bookdates[0]' AND '$bookdates[1]') OR ('$bookdates[0]' BETWEEN bk.bkin AND bk.bkout) OR ('$bookdates[1]' BETWEEN bk.bkin AND bk.bkout) 
                GROUP BY inho.id_room";
    $resultbk = mysqli_query($conn, $countbk);
    $rowbk = mysqli_fetch_array($resultbk);

    $crfr = $rowbk['crfr'];
    if($crfr != ''){
        $crfr = $rowbk['crfr'];
    }else{
        $crfr = '0';
    }

    $query = "SELECT *, round(AVG(score_to),1) as sot FROM users_add_hotel as addho 
                    INNER JOIN room_in_hotel as inho ON inho.ref_id = addho.ref_id
                    INNER JOIN users as us ON us.id = addho.ref_id
                    LEFT JOIN review_hotels as rev ON rev.ref_hotel = addho.ref_id 
                WHERE addho.province LIKE '%$location%' AND addho.status_hotel = 'ผ่านการตรวจสอบ' AND $num_adult <= inho.num_adult AND $num_kid <= inho.num_kid AND $crfr < inho.no_bed
                GROUP BY addho.ref_id";

    $result = mysqli_query($conn, $query); 

}


?>
<!-- list-main-wrap-opt-->
<div class="list-main-wrap-opt fl-wrap">
    <div class="list-main-wrap-title fl-wrap col-title">
        <h2>ผลการค้นหา : <span><?php echo $location; ?></span></h2>
    </div>

    <!-- price-opt-->
    <!-- <div class="price-opt">
        <span class="price-opt-title">Sort results by:</span>
        <div class="listsearch-input-item">
            <select data-placeholder="Popularity" class="chosen-select no-search-select" >
                <option>Popularity</option>
                <option>Average rating</option>
                <option>Price: low to high</option>
                <option>Price: high to low</option>
            </select>
        </div>
    </div> -->
    <!-- price-opt end-->

    <!-- price-opt-->
    <!-- <div class="grid-opt">
        <ul>
            <li><span class="two-col-grid act-grid-opt"><i class="fas fa-th-large"></i></span></li>
            <li><span class="one-col-grid"><i class="fas fa-bars"></i></span></li>
        </ul>
    </div> -->
    <!-- price-opt end--> 

    </div>
    <!-- list-main-wrap-opt end-->
    <!-- listing-item-container -->
    <div class="listing-item-container init-grid-items fl-wrap">



        <!-- listing-item  -->
        <?php while ($row = mysqli_fetch_array($result)) { 
            $sot=$row['sot'];
            if ($sot != ''){
                $sot=$row['sot'];
            } else {
                $sot='0';
            } 
        ?>
        <div class="listing-item">
            <article class="geodir-category-listing fl-wrap">
                <div class="geodir-category-img">
                    <a href="#"><img src="images/images_hotel_users/<?php echo $row['picture']; ?>" alt=""></a>
                    <div class="listing-avatar"><a href="#"><img src="images/img_users/<?php echo $row['picture_users']; ?>" alt=""></a>
                        <span class="avatar-tooltip">เพิ่มโดย <strong> <?php echo $row['name']; ?></strong></span>
                    </div>
                    <!-- <div class="sale-window">Sale 20%</div> -->
                    <div class="geodir-category-opt">
                        <div class="listing-rating card-popup-rainingvis" data-starrating2="<?php echo $row['sot']; ?>"></div>
                        <div class="rate-class-name">
                            <div class="score"><strong>คะแนน</strong></div>
                            <span><?php echo $sot; ?></span>                                               
                        </div>
                    </div>
                </div>
                <div class="geodir-category-content fl-wrap">
                    <div class="geodir-category-content-title fl-wrap">
                        <div class="geodir-category-content-title-item">
                            <h3 class="title-sin_map"><a href="listing-single.php?id=<?php echo $row['id']; ?> " target="_blank"><?php echo $row['name_hotel']; ?></a></h3>
                            <div class="geodir-category-location fl-wrap"><a href="#0" class="map-item">
                                <i class="fas fa-map-marker-alt"></i> <?php echo "ต.",$row['sub_area']," อ.",$row['area']," ",$row['province']; ?></a></div>
                        </div>
                    </div>
                    <p><?php echo $row['detail_hotel']; ?></p>
                    <ul class="facilities-list fl-wrap">
                        <li><i class="fal fa-wifi"></i><span>Free WiFi</span></li>
                        <li><i class="fal fa-parking"></i><span>Parking</span></li>
                        <li><i class="fal fa-smoking-ban"></i><span>Non-smoking Rooms</span></li>
                        <li><i class="fal fa-utensils"></i><span> Restaurant</span></li>
                    </ul>
                    <div class="geodir-category-footer fl-wrap">
                        <div class="geodir-category-price">ราคา<span> <?php echo $row['price_room']; ?> บาท</span></div>
                        <div class="geodir-opt-list">
                            <a href="#0" class="map-item"><i class="fal fa-map-marker-alt"></i><span class="geodir-opt-tooltip">On the map <strong>1</strong></span></a>
                            <a href="#" class="geodir-js-favorite"><i class="fal fa-heart"></i><span class="geodir-opt-tooltip">Save</span></a>
                            <a href="#" class="geodir-js-booking"><i class="fal fa-exchange"></i><span class="geodir-opt-tooltip">Find Directions</span></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <!-- listing-item end --> 

        <?php   
                }          
        ?>

    </div>
    <!-- listing-item-container end-->
    <a class="load-more-button" href="#">Load more <i class="fal fa-spinner"></i> </a>
</div>