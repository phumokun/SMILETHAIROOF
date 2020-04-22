<ul class="dasboard-menu-wrap">
    <li>
        <a href="dashboard-myprofile.php?id=<?php echo $_SESSION['id']; ?>" ><i class="far fa-user"></i>โปรไฟล์</a>
        <ul>
            <!-- <li><a href="dashboard.php?id=<?php echo $_SESSION['id']; ?>">Dashboard</a></li> -->
            <li><a href="dashboard-myprofile.php?id=<?php echo $_SESSION['id']; ?>&act=profile">แก้ไขโปรไฟล์</a></li>
            <li><a href="dashboard-myprofile.php?id=<?php echo $_SESSION['id']; ?>&act=change_password">เปลี่ยนพาสเวิร์ด</a></li>
        </ul>
    </li>
    <li><a href="dashboard-bookings.php?id=<?php echo $_SESSION['id']; ?>"> <i class="far fa-calendar-check"></i>ประวัติการจองของท่าน</a></li>
    <?php if ($_SESSION['userlevel'] === "hostel") { ?>
    <li>
        <a href="dashboard-listing-table.php?id=<?php echo $_SESSION['id']; ?>"><i class="far fa-th-list"></i>ที่พักของท่าน</a>
        <!-- <ul>
            <li><a href="dashboard-listing-table.php?id=<?php echo $_SESSION['id']; ?>">ห้องว่าง</a><span>5</span></li>
            <li><a href="#">รอจ่ายเงิน</a><span>2</span></li>
            <li><a href="#">จองเสร็จสิ้น</a><span>3</span></li>
        </ul> -->
    </li>
    <!-- เอาตัวเลขมาแสดง -->
    <?php include('layouts/count-books-room.php'); ?>
    <li><a href="dashboard-list-bookings.php?id=<?php echo $_SESSION['id']; ?>&act=waiting"> <i class="far fa-calendar-check"></i>รายการจอง<span><?php echo $count_wi; ?></span></a>
        <ul>
            <li><a href="dashboard-list-bookings.php?id=<?php echo $_SESSION['id']; ?>&act=waiting">รอการเข้าพัก</a><span><?php echo $count_wi; ?></span></li>
            <li><a href="dashboard-list-bookings.php?id=<?php echo $_SESSION['id']; ?>&act=CheckIn">ลูกค้าแจ้งเข้า</a><span><?php echo $count_in; ?></span></li>
            <li><a href="dashboard-list-bookings.php?id=<?php echo $_SESSION['id']; ?>&act=CheckOut">ลูกค้าแจ้งออก</a><span><?php echo $count_ou; ?></span></li>
            <li><a href="dashboard-list-bookings.php?id=<?php echo $_SESSION['id']; ?>&act=Cancel">ลูกค้ายกเลิก</a><span><?php echo $count_ca; ?></span></li>
        </ul>
    </li>
    <li><a href="dashboard-review.php?id=<?php echo $_SESSION['id']; ?>" class="user-profile-act"><i class="far fa-comments"></i>รีวิว</a></li>
    <?php } ?>
</ul>