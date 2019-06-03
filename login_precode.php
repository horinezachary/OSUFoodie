<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
   $uid = 111111;
// query to select all information from supplier table
	$query = "SELECT Account_ID, Username FROM Account WHERE Account_ID = $uid";

// Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
   while($row = mysqli_fetch_row($result)) {
      $uid = $row[0];
      $uname = $row[1];
   }
   mysqli_free_result($result);
   mysqli_close($conn);

   echo $uname;
?>
