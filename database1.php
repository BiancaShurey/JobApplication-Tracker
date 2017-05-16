<?php

			$servername = "localhost";
			$username = "root";
			$password = "mCeQPwYipSVI8xcx";
			$dbname = "INFS3202";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			$name=$_POST['name'];
			$company=$_POST['company'];
			$type=$_POST['type'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$location=$_POST['location'];
			$username=$_POST['username'];
			
			
			$sql = "INSERT INTO contact (name, company, type, phone, email, location, username)
			VALUES ('$name', '$company', '$type', '$phone', '$email', '$location', '$username')";
			$result = mysqli_query($sql);

			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($conn);
?>

	