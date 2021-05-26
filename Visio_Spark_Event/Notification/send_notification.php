<?php

  require_once 'conn.php';
$message=$_POST['message'];
$upload_notification=("INSERT  INTO nitifications (id,message) VALUES (NULL,'".$message."')");
if(mysqli_query($conn,$upload_notification)){

		 // On query success it will print below message.
	    
		$MSG = 'Data Successfully Submitted at ' ;
		 
		// Converting the message into JSON format.
		// Echo the message.
	    echo ($MSG);
	 }
	 else{
	 	echo "not inserted";
	 }










  ?>