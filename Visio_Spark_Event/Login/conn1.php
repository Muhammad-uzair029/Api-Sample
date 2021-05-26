<?php

$connect = new mysqli("localhost","root","","testdb");
if($connect){
	 
}else{
	echo "Fallo, revise ip o firewall";
	exit();
}