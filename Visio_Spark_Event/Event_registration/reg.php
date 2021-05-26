<?php 
	require_once 'conn.php';

	$uid='14';

	$already_registered=$conn->query("SELECT * FROM teams WHERE  user_id = '".$uid."'");
    $user_id= mysqli_fetch_row($already_registered);
    if($user_id ==null)
    {
    	echo json_encode('Duplicate entry');
    }
    else
    {$Event=$_POST['event_holder_team'];
	$consultar=$conn->query ("SELECT * FROM `events` WHERE display_name LIKE '".$Event."'");
	$data = mysqli_fetch_row($consultar);
	$event_id=$data[0];
	$max_teams=$data[4];
		   echo $event_id;
		   echo $max_teams;
		   echo $uid;

  for($i=1;$i<$max_teams;$i++)
	  {

		$SE_Name_team=$_POST['SE_Name_team'.$i];
		$First_P_team=$_POST['First_participant_team'.$i];
		$Second_P_team=$_POST['Second_participant_team'.$i];
		$Third_P_team=$_POST['Third_participant_team'.$i];
		$Fourth_P_team=$_POST['Fourth_participant_team'.$i];
 

   // $uid='5';
   // $event_id='2';
	   $Sql_Query=("INSERT INTO `teams` (`id`, `display_name`,`event_id`, `user_id`
	, `mem1`, `mem2`, `mem3`, `mem4`) VALUES (NULL, '".$SE_Name_team."', '".$event_id."', '".$uid."'
	       ,'".$First_P_team."','".$Second_P_team."',
	       '".$Third_P_team."','".$Fourth_P_team."')");	


	   // $Sql_Query=("INSERT INTO `teamoo` ( `name`) VALUES ( '".$SE_Name_team."')");	

      if(mysqli_query($conn,$Sql_Query)){

		 // On query success it will print below message.
	    
		$MSG = 'Data Successfully Submitted at '.$i ;
		 
		// Converting the message into JSON format.
		// Echo the message.
		 $data=json_encode($MSG);
	     echo ($data);
	 }
}       

}


		?>
























<!-- 		<?php 
		require_once 'conn.php';

  for($i=1;$i<3;$i++)
	  {
		$SE_Name_team=$_POST['SE_Name_team'.$i];
		$First_P_team=$_POST['First_participant_team'.$i];
		$Second_P_team=$_POST['Second_participant_team'.$i];
		$Third_P_team=$_POST['Third_participant_team'.$i];
		$Fourth_P_team=$_POST['Fourth_participant_team'.$i];
 

   $uid='5';
   $event_id='2';
	   $Sql_Query=("INSERT INTO `teams` (`id`, `display_name`,`event_id`, `user_id`
	, `mem1`, `mem2`, `mem3`, `mem4`) VALUES (NULL, '".$SE_Name_team."', '".$event_id."', '".$uid."'
	       ,'".$First_P_team."','".$Second_P_team."',
	       '".$Third_P_team."','".$Fourth_P_team."')");	


	   // $Sql_Query=("INSERT INTO `teamoo` ( `name`) VALUES ( '".$SE_Name_team."')");	

      if(mysqli_query($conn,$Sql_Query)){

		 // On query success it will print below message.
	    
		$MSG = 'Data Successfully Submitted at '.$i ;
		 
		// Converting the message into JSON format.
		// Echo the message.
		 $data=json_encode($MSG);
	     echo ($data);
	 }
}
	?> -->