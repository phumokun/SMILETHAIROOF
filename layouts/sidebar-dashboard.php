<div class="dasboard-sidebar">
    <div class="dasboard-sidebar-content fl-wrap">
        <div class="dasboard-avatar">
            <?php if (isset($_SESSION['picture_users']) == NULL)  { ?>
                <span><img src="images/avatar/1.jpg" alt=""></span>
            <?php } else { ?>
                <span><img src="images/img_users/<?php echo $_SESSION['picture_users']; ?>" alt=""></span>
            <?php } ?>
        </div>
        <div class="dasboard-sidebar-item fl-wrap">
            <h3>
                <span>ยินดีต้อนรับคุณ</span>
                <?php echo $_SESSION['name']; ?>
            </h3>
        </div>
        <a href="dashboard-add-listing.php?id=<?php echo $_SESSION['id']; ?>" class="ed-btn">เพิ่มโรงแรมของท่าน</a>                                        
        <div class="user-stats fl-wrap">
            <ul>
                <li>
                    ที่พักของท่าน	
                    <span>4</span>
                </li>
                <li>
                    ห้องที่ถูกจอง
                    <span>32</span>	
                </li>
                <li>
                    รีวิว
                    <span>9</span>	
                </li>
            </ul>
        </div>
        <a href="logout.php" class="log-out-btn color-bg">ออกจากระบบ<i class="far fa-sign-out"></i></a>
    </div>
</div>