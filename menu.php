<?php
    $restaurant = $_GET["rid"];
    $query = "SELECT item_ID AS 'Item Number', item_name AS 'Dish'  FROM Item NATURAL JOIN Restaurant
            where restaurant_ID = '$restaurant' ";

    // Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<table id='t01' border='1'><tr>";

// printing table headers
	for($i=0; $i<$fields_num; $i++) {
		$field = mysqli_fetch_field($result);
		echo "<td><b>$field->name</b></td>";
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
                echo "<td>$cell<a>".$row[0]."</a></td>";
                echo "<td>$cell<a>".$row[1]."</a></td>";
                echo "</tr>";
    }

        mysqli_free_result($result);
    ?>
</body>

</html>
