<!--
Cyber Clinic 1.0 
Concept Team: Ramaguru Radhakrishnan, Deepthi J, Roshni V, Yaswanth G, Aishwarya G S
Part of: Cyber ART Quotient
Development Started: April 2023
-->
<?php
	$ccid = $_POST["ccid"];
	$cp1 = $_POST["cp1"];
	$cp2 = $_POST["cp2"];
	$cp3 = $_POST["cp3"];
	$cp4 = $_POST["cp4"];
	$cp5 = $_POST["cp5"];
	if (!empty($ccid) || !empty($cp1) || !empty($cp2) || !empty($cp3) || !empty($cp4) || !empty($cp5) ){
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "cc1.0";
		
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		
		if(mysqli_connect_error()){
			die('Connect error ('.mysql_connect_error().')'.mysqli_connect_error());
		} else {
			
			$tp = $cp1+$cp2+$cp3+$cp4+$cp5;
			$UPDATE = "UPDATE user SET cp1 = $cp1, cp2 = $cp2, cp3= $cp3, cp4 = $cp4, cp5 = $cp5, tp = $tp WHERE ccid = $ccid"; 

			$stmt = $conn->prepare($UPDATE);
			$stmt->execute();
			echo "Scores Updated";
			
			$stmt->close();
			$conn->close();
		}
	} else {
		echo "All fields are required";
		die();
	}
	
?>