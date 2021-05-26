  
<?php

include 'conn.php';
 $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
 $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);

 $email = mysqli_real_escape_string($conn, $_POST['email']);
 // $password = mysqli_real_escape_string($conn, $_POST['password']);
 
        $query ="INSERT INTO `parents`(`first_name`, `last_name`, `email`) VALUES ('".$first_name."','".$last_name."','".$email."')";
    $results = mysqli_query($conn, $query);
    if($results>0)
    {
        echo "Student added successfully";
    }
//  $name = mysqli_real_escape_string($conn, $_POST['name']);

//     $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

 
//         $query ="INSERT INTO `mytab`(`name`, `mobile`) VALUES('".$name."','".$mobile."')";
//     $results = mysqli_query($conn, $query);
//     if($results>0)
//     {
//         echo "user added successfully";
//     }
    
?>