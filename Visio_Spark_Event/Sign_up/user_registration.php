		<?php


		require_once 'conn1.php';
		$uni_drop_down=$_POST['university'];
		$dep_drop_down=$_POST['department'];
		$Contact_person=$_POST['name'];
		$Email_Address=$_POST['email'];
		$password=$_POST['password'];
		$Contact_Number=$_POST['contact_number'];

		// 	$uni_drop_down='university';
		// $dep_drop_down='CS';
		// $Contact_person='name';
		// $Email_Address='email';
		// $password='password';
		// $Contact_Number='3567';
			$consultar=$connect->query("SELECT * FROM `departments` WHERE name LIKE '".$dep_drop_down."'");
			while($data = mysqli_fetch_row($consultar)){
				$value=$data[0];
			}

			$connect->Query("INSERT INTO `users`(`name`, `email`, `password`,`contact`, `department_id`) 
				VALUES  ('".$Contact_person."','".$Email_Address."','".$password."','".$Contact_Number."','".$value."')");


			$connect->Query("INSERT INTO `universities`(`name`,`contact`) 
				VALUES  ('".$uni_drop_down."','".$Contact_person."')");
		?>
		<!-- $validation_email=$connect->query("SELECT * FROM users WHERE email LIKE '".$Email_Address."'");

		$resultado=array();

		while($extraerDatos=$validation_email->fetch_assoc()){
		}
			$resultado[]=$extraerDatos;

		if(empty($resultado))
		{ -->