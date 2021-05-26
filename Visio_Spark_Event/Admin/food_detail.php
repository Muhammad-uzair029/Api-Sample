<?php

  require_once 'conn.php';

  $uni_query=("SELECT * FROM  universities");
  
      $food_detaail=array();
      if ($res = $conn->query($uni_query)) {

          // printf("Select query returned %d rows.\n", $res->num_rows);
        
          while ($row = $res->fetch_assoc() )
          { 
          //  for 3 member in a team
       // printf("%s %s \n", $row['name'],$row['contact']);
          $uni_name=$row['name'];
      $user_contact=$row['contact'];
     $food_detaail[]=$user_contact;


   $User_id_query=$conn->query("SELECT * from users where contact = '".$user_contact."'");
   $User_id_data=mysqli_fetch_row($User_id_query);
   $user_id=$User_id_data[0	];


   $Event_name_query=$conn->query("SELECT * from events 
   	where user_id = '".$user_id."'");
   $Event_name_data=mysqli_fetch_row($Event_name_query);
   $Event_name=$Event_name_data[1];
   $Event_max_mem=$Event_name_data[4];
   $Event_max_team=$Event_name_data[5];
   $total_food_member=$Event_max_team*$Event_max_mem;
   // print("Name is ".$Event_name);
   
   // print("Food Provide id :".$total_food_member);

$total_food_count='0';
   $total_food_query=("SELECT * from teams");
      if ($res2 = $conn->query($total_food_query)) {

          // printf("Select query returned %d rows.\n", $res1->num_rows);
        
          while ($row2 = $res2->fetch_assoc() )
          { 
       // printf("%s \n", $row1['food_provided']);
       $total_food_count+=$row2['food_provided'];
          } 
}

$food_count='0';
 $team_query=("SELECT * from teams
    where user_id = '".$user_id."'");
      if ($res1 = $conn->query($team_query)) {

          // printf("Select query returned %d rows.\n", $res1->num_rows);
        
          while ($row1 = $res1->fetch_assoc() )
          { 
          //  for 3 member in a team
       // printf("%s \n", $row1['food_provided']);
       $food_count+=$row1['food_provided'];
          } 
}

// echo json_encode($total_food_member);
// echo json_encode($count);
// echo json_encode($user_contact);
// echo json_encode($uni_name);

   $food_detaail[]=$total_food_member;
   $food_detaail[]=$food_count;
   $food_detaail[]=$$user_contact;
   $food_detaail[]=$total_food_count;


}
   // echo json_encode($food_detaail);

  }



?>