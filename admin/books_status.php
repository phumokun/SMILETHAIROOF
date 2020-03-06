<?php 

    $query = "UPDATE books_room 
                    SET status = '" . $status . "'  
                WHERE number = '" . $number . "' 
                    AND in = '" . $in . "' AND status = '" . "1" . "' ";

    $result = mysqli_query($conn, $query);

    if ($result == 1){
        echo '<script> alert("การดำเนินการเสร็จสมบูรณ์"); </script>';
        header('Refresh:0; url = ../index.php');
    }else{
        echo '<script> alert("มีบางอย่างผิดพลาด"); </script>';
        header('Refresh:0; url = ../index.php');
    }

?>