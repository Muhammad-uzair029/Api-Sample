<?php

$conn=new mysqli("localhost","root","","testdb");

if($conn){

	echo "Connection Stablished";
}
else
{
	echo "falied";
}

?>
