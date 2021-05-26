<?php

$connect = new mysqli("localhost","root","","testdb");
if($connect){
	echo "Fallo, revise ip o firewallcoonnn"; 
}else{
	echo "Fallo, revise ip o firewall";
	exit();
}