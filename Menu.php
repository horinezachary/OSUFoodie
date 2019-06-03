<!DOCTYPE html>
<?php
        session_start();
        $_SESSION["Resto"] = "La Grande";
		$currentpage="Menu";
		include "pages.php";
?>
<html>
	<head>
		<title>Menu</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>


<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php';
	include 'header.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

    // query to select all information from supplier table
/*    $restaurant = $_SESSION["Resto"];
    $query = "SELECT item_ID, item_name  FROM Item NATURAL JOIN Restaurant
            where restaurant_name = '$restaurant' ";
 */

    $restaurant = $_GET['rid'];
    $query = "SELECT item_ID, item_name  FROM Item NATURAL JOIN Restaurant
            where restaurant_name = '$restaurant' ";

    // Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
// get number of columns in table
	$fields_num = mysqli_num_fields($result);
	echo "<h1>Items:</h1>";
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
                echo "<td>$cell<a href=".$row[0].".php>".$row[0]."</a></td>";
                echo "<td>$cell<a href='ListParts.php'>".$row[1]."</a></td>";
                echo "</tr>";
    }

        mysqli_free_result($result);
        mysqli_close($conn);
    ?>
</body>

</html>


