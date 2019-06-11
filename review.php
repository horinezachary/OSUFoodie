<?php

// query to select all information from supplier table
	$query = "SELECT Student.Account_ID, sname AS 'Student', rating AS 'Rating', description AS 'Description', item_name AS 'Item', Item.item_ID, date_added AS 'Date'
	FROM Review
	INNER JOIN Item on Review.item_ID = Item.item_ID
	NATURAL JOIN Student
	WHERE Review.restaurant_ID = $rid";





/*	$queryNull = "SELECT Student.Account_ID, sname AS 'Student', rating AS 'Rating', description AS 'Description', date_added AS 'Date'
	FROM Review
	NATURAL JOIN Student
	WHERE Review.restaurant_ID = $rid";
 */
$queryNull = "SELECT Student.Account_ID, sname AS 'Student', rating AS 'Rating', description AS 'Description', date_added AS 'Date' FROM `Review` R
    Left JOIN Item I ON (R.restaurant_ID = I.restaurant_ID AND (R.item_id = I.item_ID ))
    NATURAL JOIN Student
    where R.restaurant_ID = $rid AND R.item_ID IS NULL";
	$resultNull = mysqli_query($conn, $queryNull);
	$fields_numNull = mysqli_num_fields($resultNull);







// Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<table table class='table table-bordered table-hover table-condensed' id='t01' border='1'><tr>";

// printing table headers
	for($i=0; $i<$fields_num; $i++) {
		$field = mysqli_fetch_field($result);
      if($field->name != "Account_ID" && $field->name != "item_ID"){
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
         echo "<td>$cell<a href='item.php?itemid=$row[5]&aid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[4]</a></td>";
         echo "<td>$cell<a>$row[6]</a></td>";
		echo "</tr>\n";
	}


	while($rowNull = mysqli_fetch_row($resultNull)){
			echo "<tr>";
				echo "<td>$cell<a href='account.php?aid=$rowNull[0]&uid=$uid_in&uname=$uname_in'>$rowNull[1]</a></td>";
				echo "<td>$cell<a>$rowNull[2]</td>";
				echo "<td>$cell<a>$rowNull[3]</td>";
				echo "<td> $cell<a></td>";
				echo "<td>$cell<a>$rowNull[4]</td>";
			echo "</tr>";
	}





	echo "</table>";
	mysqli_free_result($result);
	mysqli_close($conn);
?>                           
