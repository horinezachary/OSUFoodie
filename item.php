<?php  include "header.php" ?>

<div>
   </br>
		<?php
		// change the value of $dbuser and $dbpass to your username and password
			 include 'connectvars.php';

          $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
          if (!$conn) {
             die('Could not connect: ' . mysql_error());
          }
         $itemid = $_GET['itemid'];
         $query = "SELECT item_name FROM Item WHERE Item.item_ID = $itemid";
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
         //echo "</tr>\n";
         }
         echo "<h2>$res</h2>";
         echo "</br>";
          ?>

          <?php

// query to select all information from supplier table
	$query = "SELECT Student.Account_ID, sname AS 'Student', rating AS 'Rating', description AS 'Description', restaurant_name AS 'Restaurant', Restaurant.restaurant_ID, date_added AS 'Date' FROM Review INNER JOIN Restaurant ON Review.restaurant_ID = Restaurant.restaurant_ID NATURAL JOIN Student WHERE Review.item_ID = $itemid";


// Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<h1>Reviews:</h1>";
	echo "<table id='t01' border='1'><tr>";

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
         echo "<td>$cell<a href='singleRestaurant.php?rid=$row[5]&aid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[4]</a></td>";
         echo "<td>$cell<a>$row[6]</a></td>";
		echo "</tr>\n";
	}

	mysqli_free_result($result);
	mysqli_close($conn);
?>
   </div>
   </body>
</html>                                                                                                                                                                                                                                                                                                                                                                                      
