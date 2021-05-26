<?php

require_once 'conn.php';

$id=$_POST['id'];

$query=("DELETE FROM `teams` WHERE user_id='".$id."'");

	if (mysqli_query($conn, $query)) {
      print("Record deleted successfully");
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }


?>