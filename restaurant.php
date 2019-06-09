<?php  include "header.php" ?>
	<div class="container">
		<div class="row">
		<div class="col-lg-2">
		</div>
		<div class="col-lg-8">
		<br>
		<h4>Restaurants</h4>
		<div class="table-responsive">
		<?php
		// change the value of $dbuser and $dbpass to your username and password
			 include 'connectvars.php';

			$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$conn) {
				die('Could not connect: ' . mysql_error());
			}

		// query to select all information from supplier table
		/*	$query = "SELECT * FROM Restaurant";*/
			$query = "SELECT Restaurant.restaurant_ID, Restaurant.restaurant_name AS Name, Restaurant.address AS Address, avg_review as Average FROM Restaurant";
			$result = mysqli_query($conn, $query);
			if (!$result) {
				die("Query to show fields from table failed");
			}
		// get number of columns in table
			$fields_num = mysqli_num_fields($result);
			echo "<table class='table table-bordered table-hover table-condensed' id='t01' border='1' style='width:100%;'><tr>";
			for($i=0; $i<$fields_num; $i++) {
					$field = mysqli_fetch_field($result);
					if($field->name != "restaurant_ID"){
						echo "<td><b>$field->name</b></td>";
					}
			}
			echo"</tr>\n";
			/*echo "</tr>\n";
			while($row = mysqli_fetch_row($result)) {
				echo "<tr>";*/
				// $row is array... foreach( .. ) puts every element
				// of $row to $cell variable
				//foreach($row as $cell)

				while($row = mysqli_fetch_array($result)){
					echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[1]</a></td>";
					echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[2]</a></td>";
					echo "<td>$cell<a>$row[3]</a></td>";
				echo "</tr>\n";
			}
			echo "</div>";




			mysqli_free_result($result);
			mysqli_close($conn);

		?>
		</div>
		<div class="col-lg-2">
		</div>
			</div>
	</div>
	</body>
</html>
