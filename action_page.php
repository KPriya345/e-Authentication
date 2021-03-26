<?php

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $country = $_POST['country'];
  $subject = $_POST['subject'];

  if (!empty($firstname) || !empty($lastname) || !empty($country) || !empty($subject)) {
  	$host = "localhost";
  	$dbUsername = "root";
  	$dbPassword = "";
  	$dbName = "action";

  	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
  	if (mysqli_connect_error()) {
  		die('Connect Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
  	}
  	else{
      $SELECT = "SELECT country from ararat where limit = 1";
  		$INSERT = "INSERT into ararat(firstname,lastname,country,subject) values (?,?,?,?)";
  		$stmt = $conn-> prepare($SELECT);
  	
  		 {
  		
            $stmt = $conn -> prepare ($INSERT);
            $stmt -> bind_param("ssss", $firstname, $lastname, $country, $subject);
            $stmt -> execute();
            echo "new record inserted succesfully";
  		}
      
  		}
  		$stmt -> close();
  		$conn -> close();
  	}
  
  else{
  	echo "all fields are required";
  	die();
  }
?>