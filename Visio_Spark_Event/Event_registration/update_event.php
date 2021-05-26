<?php
   require_once 'conn.php';
   $user_id='14';

   $E_name_query=("SELECT * FROM teams where user_id =  '".$user_id."'");
      $data=array();
      if ($res = $conn->query($E_name_query)) {

          printf("Select query returned %d rows.\n", $res->num_rows);
        
          while ($row = $res->fetch_assoc() )
          { 
          //  for 3 member in a team
       // printf("%s \n", $row['id'].'<br/>' );
      $data[]=$row['id'];
          }
          // echo( $data[0]);  
     $counter='0';
     for($i='0';$i<'3';$i++)
     {

      $SE_Name_team=$_POST['SE_Name_team'.$i];
      $First_P_team=$_POST['First_participant_team'.$i];
      $Second_P_team=$_POST['Second_participant_team'.$i];
      $Third_P_team=$_POST['Third_participant_team'.$i];
      $Fourth_P_team=$_POST['Fourth_participant_team'.$i];

      $evet_update=$conn->query("UPDATE teams SET display_name ='".$SE_Name_team."',mem1='".$First_P_team."',mem2='".$Second_P_team."',mem3='".$Third_P_team."',mem4='".$Fourth_P_team."' where id = '".$data[$counter]."'");
     $counter++;
      }


}



      // $SE_Name_team1=$_POST['SE_Name_team1'];
      // $First_P_team1=$_POST['First_participant_team1'];
      // $Second_P_team1=$_POST['Second_participant_team1'];
      // $Third_P_team1=$_POST['Third_participant_team1'];
      // $Fourth_P_team1=$_POST['Fourth_participant_team1'];
   
      // $SE_Name_team2=$_POST['SE_Name_team2'];
      // $First_P_team2=$_POST['First_participant_team2'];
      // $Second_P_team2=$_POST['Second_participant_team2'];
      // $Third_P_team2=$_POST['Third_participant_team2'];
      // $Fourth_P_team2=$_POST['Fourth_participant_team2'];
      
      // $evet_update=$conn->query("UPDATE teams SET display_name ='".$SE_Name_team2."',mem1='".$First_P_team2."',mem2='".$Second_P_team2."',mem3='".$Third_P_team2."',mem4='".$Fourth_P_team2."' where user_id = '".$user_id."'");

      // $evet_update=$conn->query("UPDATE teams SET display_name ='".$SE_Name_team1."',mem1='".$First_P_team1."',mem2='".$Second_P_team1."',mem3='".$Third_P_team1."',mem4='".$Fourth_P_team1."' where user_id = '".$user_id."'");

      
?>
