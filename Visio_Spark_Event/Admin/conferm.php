<?php

  require_once 'conn.php';
 
 

 
$user_id=array();	
$total_food=array();	
$total_food1=array();	
$food_per_id=array(); 
$row;
$row1;
$row3;
$row2;

 
  // $sql = "SELECT SUM(`food_provided`) AS Total_food FROM `teams`";
  // $result = mysqli_query($conn, $sql);
  // $row2 = mysqli_fetch_object($result);
  //  $row3=json_encode($row2);
   // $total_food1[]=$row2;

$sql=$conn->query("SELECT SUM(`food_provided`) AS Total_food FROM `teams`");
    
 
   while($row2=$sql->fetch_assoc())
{	
       $total_food[]=$row2;

 
   $User_id_query1=$conn->query("SELECT DISTINCT user_id from teams ");
   
      while($row4=$User_id_query1->fetch_assoc())
{	
 
 
  $id=$row4['user_id'];

  $sql1=$conn->query("SELECT DISTINCT user_id, SUM(`food_provided`) AS food_per_id FROM `teams` where (user_id='".$id."')
  ");
   

    
   while($row5=$sql1->fetch_assoc())
{	
   
// print($id);

   $user_contact=$conn->query("SELECT * from users 
   	where id = '".$id."'");
   $user_contact_data=mysqli_fetch_row($user_contact);
   $user_contact=$user_contact_data[9];
   // print($user_contact);

   $uni_name=$conn->query("SELECT name from `universities`
   	where contact = '".$user_contact."'");

  
while($row6=$uni_name->fetch_assoc())
{
     $food_per_id[]=$row2+$row5+$row6;

}



}
}
} 


  
// echo json_encode($noti_data);
// echo json_encode($total_food);
// echo json_encode($total_food);
// echo json_encode($total_food);

echo json_encode($food_per_id);



?>