<?php

   	require_once 'conn.php';

   	$userid='2';
    $food_provided_team1;
    $food_provided_team2;


    $teamid1;
    $teamid2;
 
    // Extract the event id from teams 
    $E_id_query=$conn->query("SELECT * FROM teams where user_id ='".$userid."'");
    $E_id_data = mysqli_fetch_row($E_id_query);
	  $E_id=$E_id_data[3];
    print('this is '.$E_id);
   // Extract the memimum member for comparing at below to food provided field 
    $max_mm_query=$conn->query("SELECT * FROM events where id ='".$E_id."'");
    $max_mem_data = mysqli_fetch_row($max_mm_query);
    $max_member=$max_mem_data[5];
   
    // echo ("maximum rs is :".$max_member."\n");

   // extract team id`s from user id`ss 

  $T_id_query="SELECT * FROM teams WHERE user_id = '".$userid."'";
 if ($res = $conn->query($T_id_query)) {

    printf("Select query returned %d rows.\n", $res->num_rows);
     $count1;
    while ($row = $res->fetch_assoc())
    { $count1++;
        // printf("%s \n", $row['food_provided']);

      if($count1 == '1')    
        {
         $teamid1=$row['id'];
        } 
        else{
          $teamid2=$row['id'];
         }
  
    }
    echo ($teamid1."\n");  // detail of food pprovided to team one
    echo ($teamid2);  // detail of food pprovided to team two


    $res->close();
} else {

    echo "failed to fetch data\n";
}



// select the food _id From team id

    $foodt=$conn->query("SELECT * from teams where id = '".$teamid1."'");
    $fdata = mysqli_fetch_row($foodt);
    $f_id=$fdata[11];
    print($f_id);

    $foodt1=$conn->query("SELECT * from teams where id = '".$teamid2."'");
    $fdata1 = mysqli_fetch_row($foodt1);
    $f_id1=$fdata1[11];
    print($f_id1);
// then increment the food id where food is not provided to team memeber 

   if($max_member > $f_id1)
   {
    echo "please Food provided to the member of  team 2 "; 
  
    $food_provided1=$f_id1;
    $food_provided1++;
    print($food_provided1);
    $conn->query("UPDATE `teams` SET  food_provided ='".$food_provided1."' 
      WHERE id = '".$teamid2."'");
   
   }
   else if($max_member > $f_id)
   {
    echo "Plase food provided to the member of  team 1";
   
        $food_provided=$f_id;
    $food_provided++;
    print($food_provided);
    $conn->query("UPDATE `teams` SET  food_provided ='".$food_provided."' 
      WHERE id = '".$teamid1."' ");

   }
   else{
    echo "Food is already provided";
   }


// Rough Codeee

    // $mdata=mysqli_fetch_row($value2);
    // $mem1=$mdata['5'];
    // $mem2=$mdata['6'];
    // $me3=$mdata['7'];
    // $mem4=$mdata['8'];
    // $mem5=$mdata['9'];
    // echo $mem5;
    // echo $me3;
    // echo $mem4;
    // echo $mem2;
    // echo $mem1;
    






// $query="SELECT * FROM teams WHERE user_id = '".$userid."'";
//  if ($res = $conn->query($query)) {

//     printf("Select query returned %d rows.\n", $res->num_rows);
//      $count;
//     while ($row = $res->fetch_assoc())
//     { $count++;
//         // printf("%s \n", $row['food_provided']);

//       if($count == '1')    
//         {
//          $food_provided_team1=$row['food_provided'];
//         } 
//         else{
//           $food_provided_team2=$row['food_provided'];
//          }
  
//     }
//     echo ($food_provided_team1."\n");  // detail of food pprovided to team one
//     echo ($food_provided_team2);  // detail of food pprovided to team two


//     $res->close();
// } else {

//     echo "failed to fetch data\n";
// }





?>
