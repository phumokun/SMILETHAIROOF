<ul class="dasboard-menu-wrap">
    <li>
        <a href="dashboard-myprofile.php?id=<?php echo $_SESSION['id']; ?>" ><i class="far fa-user"></i>โปรไฟล์</a>
        <ul>
            <!-- <li><a href="dashboard.php?id=<?php echo $_SESSION['id']; ?>">Dashboard</a></li> -->
            <li><a href="dashboard-myprofile.php?id=<?php echo $_SESSION['id']; ?>&act=profile">แก้ไขโปรไฟล์</a></li>
            <li><a href="dashboard-myprofile.php?id=<?php echo $_SESSION['id']; ?>&act=change_password">เปลี่ยนพาสเวิร์ด</a></li>
        </ul>
    </li>
    <li>
        <a href="dashboard-listing-table.php?id=<?php echo $_SESSION['id']; ?>"  class="user-profile-act"><i class="far fa-th-list"></i>ที่พักของท่าน</a>
        <ul>
            <!-- <li><a href="dashboard-listing-table.php?id=<?php echo $_SESSION['id']; ?>">ห้องว่าง</a><span>5</span></li>
            <li><a href="#">รอจ่ายเงิน</a><span>2</span></li>
            <li><a href="#">จองเสร็จสิ้น</a><span>3</span></li> -->
        </ul>
    </li>
    <li><a href="dashboard-bookings.php?id=<?php echo $_SESSION['id']; ?>"> <i class="far fa-calendar-check"></i>ประวัติการจอง<span>2</span></a></li>
    <li><a href="dashboard-review.php?id=<?php echo $_SESSION['id']; ?>"><i class="far fa-comments"></i>รีวิว</a></li>
</ul>