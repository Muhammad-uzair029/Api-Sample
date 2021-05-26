<?php

  require_once 'conn.php';
    $uid=array();
    $ucontact=array();
    $uni_name=array();
   $team_mem=array();    
 
    
$counter='0'; 
$precounter='0'; 
   
    $user_id_query=$conn->query("SELECT  DISTINCT  user_id ,mem1,mem2,mem3,mem4 FROM teams");

    while($row=$user_id_query->fetch_assoc())
    {
 
   $id=$row['user_id'];
 
 
    $contact_user=$conn->query("SELECT  DISTINCT  email,contact  FROM users
     WHERE id='".$id."'");
  
 while($row1=$contact_user->fetch_assoc())
   {
   	$contact=$row1['contact'];
    $ucontact[]=$row1;

    $uni_name_query=$conn->query("SELECT  DISTINCT name,contact 
    	 FROM universities
    	WHERE  contact = '".$contact."'");
   
    while($row2=$uni_name_query->fetch_assoc())
    {

  $ui=$conn->query("SELECT display_name FROM events where user_id = '".$id."' ");
 
 while($row7=$ui->fetch_assoc())
   {
   $ii=$row7['display_name'];
   	// print($ii);
   if($ii=='df'){
   	$precounter='3';
   }
   if($ii=='Mobile App Dev.'){
   	$precounter='2';
   }
   
   }

// print($ii);
// print("pre".$precounter.'<br \>');

$counter++; 

if($counter > $precounter){
	$counter = '1';
}


    array_push($row2,"".$counter);

   

    // $team_mem[]=$row02;
     
     $uni_name[]=$row2+$row1+$row;



}



   }


       // $uid[]=$row;

    }





echo json_encode($uni_name);
 ?>