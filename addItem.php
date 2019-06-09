<!DOCTYPE html>
<?php
		$currentpage="Add Part";
		include "pages.php";

?>
<html>
	<head>
		<title>Add Review</title>
		<link rel="stylesheet" href="index.css">
		<script type = "text/javascript"  src = "verifyInput.js" > </script>
	</head>
<body>


<?php
	include "header.php";
	$msg = "Add new Review";

// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Escape user inputs for security
		$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
		$rid = $_GET["rid"];
		$query = "INSERT INTO Item (item_ID, item_name, restaurant_ID) VALUES( UUID(), '$item_name', '$rid')";
							if(mysqli_query($conn, $query)){
											$msg =  "Record added successfully.<p>";
							} else{
											echo "ERROR: Could not able to execute $query." . mysqli_error($conn);
							}




// See if pid is already in the table
  /* $queryIn = "SELECT * FROM Parts where pid='$pid' ";
   $resultIn = mysqli_query($conn, $queryIn);
   if (mysqli_num_rows($resultIn)> 0) {
       $msg ="<h2>Can't Add to Table</h2> There is already a part with pid $pid<p>";
            } else {

                // attempt insert query
                        $query = "INSERT INTO Parts (pid, pname, color) VALUES('$pid', '$pname', '$color')";
                        if(mysqli_query($conn, $query)){
                                $msg =  "Record added successfully.<p>";
                        } else{
                                echo "ERROR: Could not able to execute $query." . mysqli_error($conn);
                        }
                }*/

}
// close connection
mysqli_close($conn);
 echo "<a href= 'ownerEdit.php?rid=$rid&uid=$uid_in&uname=$uname_in'> Go Back</a>";
?>
	<section>
    <h2> <?php echo $msg; ?> </h2>

<form method="post" id="addForm">
<fieldset>
	<legend>Item Info:</legend>


		<p>
				<label for="Item Name">Item Name:</label>
				<input type="text" class="required" name="item_name" id="item_name">

</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
</body>
</html>
