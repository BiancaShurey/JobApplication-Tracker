<?php

			$servername = "localhost";
			$username = "root";
			$password = "mCeQPwYipSVI8xcx";
			$dbname = "INFS3200";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			
			$sql = "INSERT INTO MyGuests (company_name, type, industry, location)
			VALUES ('".$_POST['organisation']."', '".$_POST['type']."' '".$_POST['industry']."', '".$_POST['location']."' )";

			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($conn);
?>

	