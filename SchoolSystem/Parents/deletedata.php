<?php

include 'conn.php';
$id = mysqli_real_escape_string($conn, $_POST['id']);
$conn->query("DELETE FROM parents WHERE id = '".$id."'");


?>