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
			
			$sql = "SELECT * FROM contact";
			$result = mysqli_query($conn, $sql); ?>
			
			
<html lang="en">
<head>
  <title>Company List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
		
			

<div class="container">
  <h2>Basic Table</h2>
  <p></p>            
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Company</th>
        <th>Type</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Location</th>
		<th>Username</th>
      </tr>
    </thead>
	
			
            
            
	<tbody>
<?php
		while( $company = mysqli_fetch_array($result)){
			
		echo "<tr><td>".$company['name']."</td><td>".$company['company']."</td><td>".$company['type']."</td><td>".$company['phone']."</td><td>".$company['email']."</td><td>".$company['location']."</td><td>".$company['username']."</td></tr>";
			
	}
	?>
	<?php
	mysqli_close($conn); ?>
	</tbody>
  </table>
	
</div>

</body>
</html>	