<?php  include "header.php" ?>

<div class="container">
<div class="row">
<div class="col-lg-2">
</div>
<div class="col-lg-8">
   </br>
		<?php
		// change the value of $dbuser and $dbpass to your username and password
			 include 'connectvars.php';

          $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
          if (!$conn) {
             die('Could not connect: ' . mysql_error());
          }
         $itemid = $_GET['itemid'];
         $query = "SELECT Item.item_name, Restaurant.restaurant_name FROM Item, Restaurant WHERE Item.item_ID = $itemid AND Restaurant.restaurant_ID = Item.restaurant_ID";
 			$result = mysqli_query($conn, $query);
 			if (!$result) {
 				die("Query to show fields from table failed");
    		}

    		// get number of columns in table
         $fields_num = mysqli_num_fields($result);
         while($row = mysqli_fetch_array($result)){
            //echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&rname=$row[1]&uid=$uid_in&uname=$uname_in'>".$row[1]."</a></td>";
            //echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&rname=$row[1]&uid=$uid_in&uname=$uname_in'>".$row[2]."</a></td>";
            //echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&rname=$row[1]&uid=$uid_in&uname=$uname_in'>".$row[3]."</a></td>";
			$res = $row[0];
			$res2 = $row[1];
         //echo "</tr>\n";
         }
		 echo "<h4 style='text-align:center'>$res</h4>";
		 echo "<h6 style='text-align:center'>$res2</h6>";
         echo "</br>";
          ?>

          <?php

// query to select all information from supplier table
	$query = "SELECT Student.Account_ID, sname AS 'Student', rating AS 'Rating', description AS 'Description', Restaurant.restaurant_ID, date_added AS 'Date' FROM Review INNER JOIN Restaurant ON Review.restaurant_ID = Restaurant.restaurant_ID NATURAL JOIN Student WHERE Review.item_ID = $itemid";


// Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<h4>Reviews:</h4>";
	echo "<table class='table table-bordered table-hover table-condensed' id='t01' border='1' style='width:100%;'><tr>";

// printing table headers
	for($i=0; $i<$fields_num; $i++) {
		$field = mysqli_fetch_field($result);
      if($field->name != "Account_ID" && $field->name != "restaurant_ID"){
         echo "<td><b>$field->name</b></td>";
      }
	}
	echo "</tr>\n";
	while($row = mysqli_fetch_row($result)) {
		echo "<tr>";
		// $row is array... foreach( .. ) puts every element
		// of $row to $cell variable
			echo "<td>$cell<a href='account.php?aid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[1]</a></td>";
         echo "<td>$cell<a>$row[2]</a></td>";
         echo "<td>$cell<a>$row[3]</a></td>";
         echo "<td>$cell<a>$row[5]</a></td>";
		echo "</tr>\n";
	}
	echo "</table>";
	mysqli_free_result($result);
	mysqli_close($conn);
?>
	</div>
	</div>
   </div>
   </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                           