<?php


include 'conn.php';
$id=$_POST['id'];
$first_name=$_POST['first_name'];
$email=$_POST['email'];
$conn->query("UPDATE `parents`  SET `first_name`='".$first_name."',`email`='".$email."' WHERE id=".$id );

?>