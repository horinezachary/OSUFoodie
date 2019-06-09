<?php
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die('Could not connect: ' . mysql_error());
    }
    $restaurant = $_GET["rid"];
    $query = "SELECT item_ID, item_name AS 'Dish'  FROM Item NATURAL JOIN Restaurant
            where restaurant_ID = '$restaurant' ";

    // Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<table table table class='table table-bordered table-hover table-condensed' id='t01' border='1' style='width:75%'><tr>";

// printing table headers
	for($i=0; $i<$fields_num; $i++) {
		$field = mysqli_fetch_field($result);
      if($field->name != "item_ID"){
         echo "<td><b>$field->name</b></td>";
      }
	}
    echo "</tr>\n";
    /*
	while($row = mysqli_fetch_row($result)) {
		echo "<tr>";
		// $row is array... foreach( .. ) puts every element
		// of $row to $cell variable
		foreach($row as $cell)
			echo "<td>$cell</td>";
		echo "</tr>\n";
    }*/
    while($row = mysqli_fetch_array($result)) {
        //foreach($row as $cell)
                //echo $_SESSION['Resto'];
               // echo "Favorite color is ".$_SESSION["favcolor"].".<br>"
                //echo "<td>$cell<a>".$row[0]."</a></td>";
                echo "<td>$cell<a href='item.php?itemid=".$row[0]."&uid=$uid_in&uname=$uname_in'>".$row[1]."</a></td>";
                echo "</tr>";
    }
        echo "</table>";
        mysqli_free_result($result);
    ?>
</body>

</html>
