<?php
   require_once 'conn.php';
   $user_id='14';
   $E_id_query=$conn->query("SELECT * from teams where user_id = '".$user_id."' ");
   $E_id_data=mysqli_fetch_row($E_id_query);
   $event_id=$E_id_data[3];
   
   // print($event_id);

   $E_name_query=$conn->query("SELECT * FROM events where id=  '".$event_id."'");
   $E_name_data=mysqli_fetch_row($E_name_query);
   $event_name=$E_name_data[1];
   print($event_name);














?>