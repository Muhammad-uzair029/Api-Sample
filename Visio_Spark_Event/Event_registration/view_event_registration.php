<?php

   require_once  'conn.php';
   $id='14';
   $query=$conn->query("SELECT * FROM teams WHERE user_id='".$id."'");
$noti_data=array(); 

while($row=$query->fetch_assoc())
{
  $noti_data[]=$row;
}


echo json_encode($noti_data);


//  $data=array();
//       if ($res = $conn->query($query)) {

//           printf("Select query returned %d rows.\n", $res->num_rows);
        
//           while ($row = $res->fetch_assoc() )
//           { 
//           //  for 3 member in a team
//        // printf("%s %s %s %s %s \n", $row['mem1'],$row['mem2'], $row['mem3'],$row['mem4'],$row['mem5'] .'<br/>' );
     

//       $data[0]=$row['mem1'];
//       $data[1]=$row['mem2'];
//       $data[2]=$row['mem3'];
//       $data[3]=$row['mem4'];
//       $data[4]=$row['mem5'];
//           }
// }
//  echo json_encode('First memeber is: '.$data[1] );
//  echo json_encode('  ');
// echo json_encode('Second memeber is: '.$data[0] );
//  echo json_encode('   ');
// echo json_encode('Third memeber is: '.$data[2] );
// echo json_encode('   ');
// echo json_encode('Fourth memeber is: '.$data[3] );
// echo json_encode('Fifth memeber is: '.$data[4] );


?>
