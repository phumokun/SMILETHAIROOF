<?php 
    session_start();
    include_once '../connectdb.php';

    if (isset($_SESSION['email'])) {

		//sql command
		$query = "SELECT * FROM users_add_hotel";
		//execute sql command
		$result = mysqli_query($conn, $query);
  
        
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Feed</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-light bg-light" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">PHP Simple CRUD</a>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-4 well mx-auto">
			<legend>โรงแรมทั้งหมด</legend>
            <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ชื่อโรงแรม</th>
                        <th>ที่อยู่โรงแรม</th>
                        <th>อีเมลล์</th>
                        <th>เบอร์โทรติดต่อ</th>
                        <th colspan="2" style="text-align:center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['id_hotel']; ?></td>
                    <td><?php echo $row['name_hotel']; ?></td>
                    <td><?php echo $row['hotel_number']," ",$row['land']," ",$row['village_no']," ต.",$row['sub_area']," อ.",$row['area']," ",$row['province'], " ",$row['postal_code']; ?></td>
                    <td><?php echo $row['email_hotel']; ?></td>
                    <td><?php echo $row['phone_hotel']; ?></td>
                    <td>
                        <input type="button" name="update" value="ผ่าน" 
                        class="btn btn-primary" onclick="update(<?php echo $row['id_hotel']; ?>)">
                    </td>
                    <td>
                        <input type="button" name="cancel" value="ไม่ผ่าน" 
                        class="btn btn-primary" onclick="cancel(<?php echo $row['id_hotel']; ?>)">
                    </td>
                </tr>
                <?php } ?>   
                </tbody>
             </table>
            </div>
			<!--display message -->
			<span class="text-danger"></span>
		</div>
	</div>
</div>
<script>
    function update(id_hotel) {
        if (confirm('ข้อมูลถูกต้องแล้วใช่หรือไม่')) {
            window.location.href = "update_hotel.php?val=ผ่านการตรวจสอบ&id=" + id_hotel;
        }
    }
    function cancel(id_hotel) {
        window.location.href = "update_user.php?id=" + id_hotel;
    }

 </script>
</body>
</html>
