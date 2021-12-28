<?php

//database connection  file
include('./db.php');
include_once('./repo.php');

//Code for deletion
if (isset($_GET['oid'])) {
    $oid = intval($_GET['oid']);
    $isOpen = "yes";
    openCenter($oid, $isOpen);
    echo "<script>window.location.href = 'vcenter.php'</script>";
}