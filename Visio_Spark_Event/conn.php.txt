<?php

$connect = new mysqli("localhost","root","","logindb");
if($connect){
	 
}else{
	echo "Fallo, revise ip o firewall";
	exit();
}