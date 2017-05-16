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
			
			
				$company = $_POST["company"];
				$type = $_POST["type"];
				$industry = $_POST["industry"];
				$values = $_POST["values"];
				$diversity = $_POST["diversity"];
				$size = $_POST["size"];
				$finances = $_POST["finances"];
				$people = $_POST["people"];
				$website = $_POST["website"];
				$focus = $_POST["focus"];
				$username = $_POST["username"];
			
			
			
			$sql = "INSERT INTO company (company, type, industry, value, diversity, size, finances, people, website, focus, username)
			VALUES ('$company', '$type', '$industry', '$values', '$diversity', '$size', '$finances', '$people', '$website', '$focus', '$username')";
			$result = mysqli_query($sql);

			if (mysqli_query($conn, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($conn);
?>