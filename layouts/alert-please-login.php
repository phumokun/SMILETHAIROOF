<?php 

    if (!isset($_SESSION['id']) or $_SESSION['id'] == NULL ) {
        echo '<script> alert("Please Login")</script>';
        header('Refresh:0; url = index.php');
        exit();
    }

?>