<div class="col-md-4">
    <div class="mobile-list-controls fl-wrap">
        <div class="mlc show-hidden-column-map schm"><i class="fal fa-map-marked-alt"></i> Show Map</div>
        <div class="mlc show-list-wrap-search"><i class="fal fa-filter"></i> Filter</div>
    </div>
    <form action="listing2.php?act=search" method="post">
        <div class="fl-wrap filter-sidebar_item fixed-bar">
            <div class="filter-sidebar fl-wrap lws_mobile">
                <!--col-list-search-input-item -->
                <div class="col-list-search-input-item in-loc-dec fl-wrap not-vis-arrow">
                    <label>จังหวัด</label>
                    <div class="listsearch-input-item">
                        <select data-placeholder="City" class="chosen-select" name="location">
                            <?php include('layouts/option-city.php'); ?>
                        </select>
                    </div>
                </div>
                <!--col-list-search-input-item end-->   

                <!--col-list-search-input-item -->
                <!-- <div class="col-list-search-input-item fl-wrap location autocomplete-container">
                    <label>เมืองที่ต้องการพัก</label>
                    <span class="header-search-input-item-icon"><i class="fal fa-map-marker-alt"></i></span>
                    <input type="text" placeholder="เมืองที่พัก" class="autocomplete-input" id="autocompleteid3" value=""/>
                    <a href="#"><i class="fal fa-dot-circle"></i></a>
                </div> -->
                <!--col-list-search-input-item end-->

                <!--col-list-search-input-item -->
                <div class="col-list-search-input-item in-loc-dec date-container  fl-wrap">
                    <label>วันที่ เข้า-ออก</label>
                    <span class="header-search-input-item-icon"><i class="fal fa-calendar-check"></i></span>
                    <input type="text"   placeholder="วันที่ต้องการพัก" name="bookdates"  value=""/>
                </div>
                <!--col-list-search-input-item end-->
                <!--col-list-search-input-item -->
                <div class="col-list-search-input-item fl-wrap">
                    <!-- <div class="quantity-item">
                        <label>ห้อง</label>
                        <div class="quantity">
                            <input type="number" min="1" max="3" step="1" value="1">
                        </div>
                    </div> -->
                    <div class="quantity-item">
                        <label>ผู้ใหญ่</label>
                        <div class="quantity">
                            <input type="number" name="num_adult" min="1" max="5" step="1" value="0">
                        </div>
                    </div>
                    <div class="quantity-item">
                        <label>เด็ก</label>
                        <div class="quantity">
                            <input type="number" name="num_kid" min="0" max="5" step="1" value="0">
                        </div>
                    </div>
                </div>
                <!--col-list-search-input-item end-->
                <!--col-list-search-input-item -->                                            
                <!-- <div class="col-list-search-input-item fl-wrap">
                    <div class="range-slider-title">Price range</div>
                    <div class="range-slider-wrap fl-wrap">
                        <input class="range-slider" data-from="300" data-to="1200" data-step="50" data-min="50" data-max="2000" data-prefix="$">
                    </div>
                </div> -->
                <!--col-list-search-input-item end-->                                        
                <!--col-list-search-input-item -->
                <div class="col-list-search-input-item fl-wrap">
                    <label>เรตติ้ง</label>
                    <div class="search-opt-container fl-wrap">
                        <!-- Checkboxes -->
                        <ul class="fl-wrap filter-tags">
                            <li class="five-star-rating">
                                <input id="check-aa2" type="checkbox" name="check" checked>
                                <label for="check-aa2"><span class="listing-rating card-popup-rainingvis" data-starrating2="5"><span>5 Stars</span></span></label>
                            </li>
                            <li class="four-star-rating">
                                <input id="check-aa3" type="checkbox" name="check">
                                <label for="check-aa3"><span class="listing-rating card-popup-rainingvis" data-starrating2="5"><span>4 Star</span></span></label>
                            </li>
                            <li class="three-star-rating">                                          
                                <input id="check-aa4" type="checkbox" name="check">
                                <label for="check-aa4"><span class="listing-rating card-popup-rainingvis" data-starrating2="5"><span>3 Star</span></span></label>
                            </li>
                        </ul>
                        <!-- Checkboxes end -->
                    </div>
                </div>
                <!--col-list-search-input-item end-->
                <!--col-list-search-input-item  -->                                         
                <div class="col-list-search-input-item fl-wrap">
                    <button name="search" class="header-search-button" onclick="window.location.href='listing.html'">ค้นหา <i class="far fa-search"></i></button>
                </div>
                <!--col-list-search-input-item end--> 
            </div>
        </div>
    </form>
</div>