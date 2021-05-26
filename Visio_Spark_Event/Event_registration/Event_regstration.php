		<?php 
		require_once 'conn.php';

	  $uid='14';

	$already_registered=$conn->query("SELECT * FROM teams WHERE  user_id = '".$uid."'");
    $user_id= mysqli_fetch_row($already_registered);
    if($user_id !=null){
    	echo json_encode('Duplicate entry');
    }else{
    

	$Event=$_POST['event_holder_team'];
	$consultar=$conn->query ("SELECT * FROM `events` WHERE display_name LIKE '".$Event."'");
	$data = mysqli_fetch_row($consultar);
	$event_id=$data[0];
	$max_teams=$data[4];
		   echo $event_id;
		   echo $max_teams;
	  for($i=1;$i<$max_teams;$i++)
	  {
		$SE_Name_team=$_POST['SE_Name_team'.$i];
		$First_P_team=$_POST['First_participant_team'.$i];
		$Second_P_team=$_POST['Second_participant_team'.$i];
		$Third_P_team=$_POST['Third_participant_team'.$i];
		$Fourth_P_team=$_POST['Fourth_participant_team'.$i];


	   $Sql_Query=("INSERT INTO `teams` (`id`, `display_name`,`event_id`, `user_id`, `mem1`, `mem2`, `mem3`, `mem4`) VALUES (NULL, '".$SE_Name_team."', '".$event_id."', '".$uid."','".$First_P_team."','".$Second_P_team."','".$Third_P_team."','".$Fourth_P_team."')");	


	if(mysqli_query($conn,$Sql_Query)){

		 // On query success it will print below message.
	    
		$MSG = 'Data Successfully Submitted at '.$i ;
		 
		// Converting the message into JSON format.
		// Echo the message.
		 $data=json_encode($MSG.$team_no);
	     echo ($data);
	 }

	    echo ($First_P_team);
	    echo "<br>";
	    echo ($Second_P_team);
	    echo "<br>";
	    echo ($Third_P_team);
	    echo "<br>";
	    echo ($Fourth_P_team);
	}   /// for  loooppp closeeee
       

}


		?>







		<!-- 	<?php 
		require_once 'conn.php';
	    // $Event='Engineering Project';
		// $SE_Name='title';
		$uid='2';
		$eid='1';
		$Event=$_POST['event_holder_team1'];
		
	/// team 22 database
		$SE_Cat_team1=$_POST['SE_Catagory_team1'];
		$SE_Name_team1=$_POST['SE_Name_team1'];
		$First_P_team1=$_POST['First_participant_team1'];
		$Second_P_team1=$_POST['Second_participant_team1'];
		$Third_P_team1=$_POST['Third_participant_team1'];
		$Fourth_P_team1=$_POST['Fourth_participant_team1'];

	     //  teamss two database jnbbb;;;
	    $SE_Cat_team2=$_POST['SE_Catagory_team2'];
		$SE_Name_team2=$_POST['SE_Name_team2'];
		$First_P_team2=$_POST['First_participant_team2'];
		$Second_P_team2=$_POST['Second_participant_team2'];
		$Third_P_team2=$_POST['Third_participant_team2'];
		$Fourth_P_team2=$_POST['Fourth_participant_team2'];

		// $user_id='1';
	    //   teams 222 data;;
	    
	// $Event=$_POST['event_holder';
		// $SE_Cat='SE_Catagory';
		// $SE_Name=$_POST['SE_Name'];
		// $Event='Engineering Project';
		// $SE_Name='title';
		// $uid='2';
		// $eid='1';
		// $First_P='First_participant';
		// $Second_P='Second_participant';
		// $Third_P='Third_participant';
		// $Fourth_P='Fourth_participant';



		$consultar=$conn->query ("SELECT * FROM `events` WHERE display_name LIKE '".$Event."'");
		$data = mysqli_fetch_row($consultar);
		$event_id=$data[0];
		$max_teams=$data[4];
		   echo $event_id;
		   echo $max_teams;
	     
	   $Sql_Query_team1=("INSERT INTO `teams` (`id`, `display_name`,`event_id`, `user_id`, `mem1`, `mem2`, `mem3`, `mem4`) VALUES (NULL, '".$SE_Name_team1."', '".$event_id."', '".$uid."','".$First_P_team1."','".$Second_P_team1."','".$Third_P_team1."','".$Fourth_P_team1."')");	
	     
	   $Sql_Query_team2=("INSERT INTO `teams` (`id`, `display_name`,`event_id`, `user_id`, `mem1`, `mem2`, `mem3`, `mem4`) VALUES (NULL, '".$SE_Name_team2."', '".$event_id."', '".$uid."','".$First_P_team2."','".$Second_P_team2."','".$Third_P_team2."','".$Fourth_P_team2."')");	
	    
	if(mysqli_query($conn,$Sql_Query_team1)){
	    if(mysqli_query($conn,$Sql_Query_team2))
	    {

		 // On query success it will print below message.
	    
		$MSG = 'Data Successfully Submitted.' ;
		 
		// Converting the message into JSON format.
		// Echo the message.
		 $data=json_encode($MSG);
	     echo ($data);
	 }
	}
		?> -->