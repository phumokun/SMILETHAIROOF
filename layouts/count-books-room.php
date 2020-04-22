<?php 

    include_once 'connectdb.php';

    // waiting
    $query_wi = "SELECT COUNT(status) as st_wi FROM books
                WHERE status = 'waiting'
                GROUP BY status";
    $result_wi = mysqli_query($conn, $query_wi);
    $row_wi = mysqli_fetch_array($result_wi);

    $count_wi = $row_wi['st_wi'];
    if ($count_wi != '') {
        $count_wi = $row_wi['st_wi'];
    } else {
        $count_wi = '0';
    }

    // CheckIn
    $query_in = "SELECT COUNT(status) as st_in FROM books
                WHERE status = 'CheckIn'
                GROUP BY status";
    $result_in = mysqli_query($conn, $query_in);
    $row_in = mysqli_fetch_array($result_in);

    $count_in =  $row_in['st_in'];
    if ($count_in != '') {
        $count_in = $row_in['st_in'];
    } else {
        $count_in = '0';
    }

    // CheckOut
    $query_ou = "SELECT COUNT(status) as st_ou FROM books
                WHERE status = 'CheckOut'
                GROUP BY status";
    $result_ou = mysqli_query($conn, $query_ou);
    $row_ou = mysqli_fetch_array($result_ou);

    $count_ou =  $row_ou['st_ou'];
    if ($count_ou != '') {
        $count_ou = $row_ou['st_ou'];
    } else {
        $count_ou = '0';
    }

    // Cancel
    $query_ca = "SELECT COUNT(status) as st_ca FROM books
                WHERE status = 'Cancel'
                GROUP BY status";
    $result_ca = mysqli_query($conn, $query_ca);
    $row_ca = mysqli_fetch_array($result_ca);

    $count_ca =  $row_ca['st_ca'];
    if ($count_ca != '') {
        $count_ca = $row_ca['st_ca'];
    } else {
        $count_ca = '0';
    }


?>
