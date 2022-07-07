<?php
include 'database.php';
$data_id=$_POST['id'];

$delete=$database->delete($data_id);

?>