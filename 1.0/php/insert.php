<!--
Cyber Clinic 1.0 
Concept Team: Ramaguru Radhakrishnan, Deepthi J, Roshni V, Yaswanth G, Aishwarya G S
Part of: Cyber ART Quotient
Development Started: April 2023
-->
<?php
	$ccidconst = "CC2023_Deepak_";
	$name = $_POST["name"];
	$dsgn = $_POST["dsgn"];
	$phnm = $_POST["phnm"];
	$email = $_POST["email"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	if (!empty($name) || !empty($dsgn) || !empty($phnm) || !empty($email) || !empty($age) || !empty($gender) ){
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "cc1.0";
		
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		
		if(mysqli_connect_error()){
			die('Connect error ('.mysql_connect_error().')'.mysqli_connect_error());
		} else {
			$SELECT = "SELECT * From user ";
			$INSERT = "INSERT Into user (ccid, name, dsgn, phnm, email, age, gender) values (?,?,?,?,?,?,?)"; 
			
			$stmt = $conn->prepare($SELECT);
			$stmt->execute();
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			
			if ($rnum >= 0){
				$stmt->close();
				$stmt = $conn->prepare($INSERT);
				$ccid = $ccidconst.$rnum+1;
				$stmt->bind_param("sssssss", $ccid, $name, $dsgn, $phnm, $email, $age, $gender);
				$stmt->execute();
				echo "New record added";
				header('Location: ../html/phishing_1.html');
			} else{
				echo "This email id already exist";
				#header('Location: ../html/registration.html');
			}
			$stmt->close();
			$conn->close();
		}
	} else {
		echo "All fields are required";
		die();
	}
	
?>