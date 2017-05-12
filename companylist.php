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
			
			$sql = "SELECT * FROM company";
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
        <th>Company</th>
        <th>Type</th>
        <th>Industry</th>
		<th>Value</th>
		<th>Diversity</th>
		<th>Size</th>
		<th>Finances</th>
		<th>People</th>
		<th>Website</th>
		<th>Focus</th>
		<th>Username</th>
      </tr>
    </thead>
	
			
            
            
	<tbody>
<?php
		while( $company = mysqli_fetch_array($result)){
			
		echo "<tr><td>".$company['Company']."</td><td>".$company['Type']."</td><td>".$company['Industry']."</td><td>".$company['Value']."</td><td>".$company['Diversity']."</td><td>".$company['Size']."</td><td>".$company['Finances']."</td><td>".$company['People']."</td><td>".$company['Website']."</td><td>".$company['Focus']."</td><td>".$company['username']."</td></tr>";
			
	}
	?>
	<?php
	mysqli_close($conn); ?>
	</tbody>
  </table>
	
</div>

</body>
</html>	