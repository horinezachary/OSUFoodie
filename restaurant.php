<!DOCTYPE html>
<?php
		$currentpage="Restaurant";
		include "pages.php";
?>
<html>
	<head>
		<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title></title>
		<link rel="stylesheet" href="index.css">
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
<body>




<div class="logo_header">
<h2 class="logo">Logo</h2>
 <a class="login" href="#login">Login</a>
 <h2 class="current_page">Restaurants</h2>

</div>


		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>


		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<div class="d-md-flex d-block flex-row mx-md-auto mx-0">

			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Restaurant</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Account</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About Us</a>
				</li>

			</ul>
		</div>
		</div>
	</nav>

	<div>
		<h2>Restaurants</h2>
		<?php
		// change the value of $dbuser and $dbpass to your username and password
			 include 'connectvars.php';

			$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$conn) {
				die('Could not connect: ' . mysql_error());
			}

		// query to select all information from supplier table
		/*	$query = "SELECT * FROM Restaurant";*/
			$query = "SELECT Restaurant.restaurant_name, Restaurant.address, average FROM Restaurant LEFT JOIN (SELECT Review.restaurant_ID, avg(Review.rating) as average FROM Review GROUP BY restaurant_ID) AS R ON Restaurant.restaurant_ID = R.restaurant_ID
ORDER BY average DESC";
			$result = mysqli_query($conn, $query);
			if (!$result) {
				die("Query to show fields from table failed");
			}
		// get number of columns in table
			$fields_num = mysqli_num_fields($result);
			echo "<table id='t01' border='1'><tr>";
			for($i=0; $i<$fields_num; $i++) {
				$field = mysqli_fetch_field($result);
				echo "<td><b>$field->name</b></td>";
			}
			echo "</tr>\n";
			while($row = mysqli_fetch_row($result)) {
				echo "<tr>";
				// $row is array... foreach( .. ) puts every element
				// of $row to $cell variable
				foreach($row as $cell)
					echo "<td>$cell</td>";
				echo "</tr>\n";
			}




			mysqli_free_result($result);
			mysqli_close($conn);

		?>


	</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
