<?php

    // $conn = mysqli_connect("localhost","root","yrrfUmlxIc4o","smilethairoof");

    // $conn->set_charset("utf8");

    // if(!$conn) {
    //     die("Failed to connec to database" . mysqli_error($conn));
    // }
?>

<?php

    $conn = mysqli_connect("localhost","root","","smilethairoof");

    $conn->set_charset("utf8");

    if(!$conn) {
        die("Failed to connec to database" . mysqli_error($conn));
    }
?>