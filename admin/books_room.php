 <?php 
    session_start();

    include_once '../connectdb.php';


    // $query = "SELECT * FROM books 
    //                 LEFT JOIN room_in_hotel as roomho ON books.ref_room = roomho.id 
    //             WHERE books.in = '" . $in . "' AND books.phone = '" . $phone . "' AND books.status = '" . "1" . "' ";

    // $result = mysqli_query($conn, $query);

    // echo $query;
    // exit();


?>
 
 <!DOCTYPE html>
 <html>
 <head>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" >
     <title>PHP Admin | Users</title>
     <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
 </head>
 <body>
 <nav class="navbar navbar-default" role="navigation">
     <div class="container-fluid">
     	<!-- add header -->
     	<div class="navbar-header">
     		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
         		<span class="sr-only">Toggle navigation</span>
         		<span class="icon-bar"></span>
         		<span class="icon-bar"></span>
         		<span class="icon-bar"></span>
    		</button>
     		<a class="navbar-brand" href="index.php">PHP Simple CRUD</a>
     	</div>
     	<!-- menu items -->
     	<div class="collapse navbar-collapse" id="navbar1">
     		<ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['admin_name'])) { ?>
                    <li><p class="navbar-text">Signed in as <?php echo $_SESSION['admin_name']; ?></p></li>
				    <li><a href="logout.php">Log Out</a></li>
                <?php } else { ?>
     			    <li><a href="login.php">Login</a></li>
     			    <li><a href="register.php">Sign Up</a></li>
     			    <li class="active"><a href="admin_login.php">Admin</a></li>
                <?php } ?>
     		</ul>
     	</div>
     </div>
 </nav>

 <div class="container">
     <div class="row">
         <div class="col-xs-8 col-xs-offset-2">
             <legend>Show All Users</legend>

            <div class="table-responsive">
             <table class="table table-bordered table-hover">
                 <thead>
                     <tr>
                         <th>ยกเลิก</th>
                         <th>เลขที่ห้อง</th>
                         <th>ประเภทห้อง</th>
                         <th>เข้าพัก</th>
                         <th>ออก</th>
                         <th>ราคา</th>
                         <th colspan="2" style="text-align:center">Actions</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['price_adult']; ?></td>
                        <td>
                            <input type="button" name="edit" value="Edit" 
                            class="btn btn-primary" onclick="edit_user(<?php echo $row['id']; ?>)">
                        </td>
                        <td>
                            <input type="button" name="delete" value="Delete" 
                            class="btn btn-primary" onclick="delete_user(<?php echo $row['id']; ?>)">
                        </td>
                    </tr>
                 <?php } ?>   
                 </tbody>
             </table>
            </div>
            <!--display number of records -->
            <div class="panel-footer"></div>
         </div>
     </div>
 </div>
 <script>
    function delete_user(id) {
        if (confirm('Confirm to delete this ID')) {
            window.location.href = "show_user.php?id=" + id;
        }
    }
    function edit_user(id) {
        window.location.href = "update_user.php?id=" + id;
    }

 </script>
 </body>
 </html>
