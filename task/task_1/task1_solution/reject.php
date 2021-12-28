<?php

//database connection  file
include('./db.php');
include_once('./repo.php');

//Code for deletion
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $data = deletedata($rid);
    $sql = mysqli_query($con, $data);
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'data.php'</script>";
}