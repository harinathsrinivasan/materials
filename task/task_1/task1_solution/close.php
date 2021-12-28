<?php

//database connection  file
include('./db.php');
include_once('./repo.php');

//Code for deletion
if (isset($_GET['cid'])) {
    $cid = intval($_GET['cid']);
    $isOpen = "no";
    closeCenter($cid, $isOpen);
    echo "<script>window.location.href = 'vcenter.php'</script>";
}