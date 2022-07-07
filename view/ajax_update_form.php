<?php
include 'database.php';
$edit_id=$_POST['edit_id'];
$edit_fname=$_POST['edit_fname'];
$edit_lname=$_POST['edit_lname'];
$edit_email=$_POST['edit_email'];
$edit_gender=$_POST['edit_gender'];
$edit_age=$_POST['edit_age'];
$edit_address=$_POST['edit_address'];

$update=$database->Update($edit_id,$edit_fname,$edit_lname,$edit_email,$edit_gender,$edit_age,$edit_address);

?>