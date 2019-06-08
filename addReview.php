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
		$rating = mysqli_real_escape_string($conn, $_POST['rating']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
		$queryIn = "SELECT item_ID FROM Item where item_name = '$item_name'";
		$it_id = mysqli_query($conn,$queryIn);
		$fields_num = mysqli_num_fields($it_id);
		while($row = mysqli_fetch_array($it_id)){
			$iid = $row[0];
		}
		$queryIn = "SELECT sID FROM Student where Account_ID = $uid_in";
		$s_id = mysqli_query($conn,$queryIn);
		$fields_num = mysqli_num_fields($s_id);
		while($row = mysqli_fetch_array($s_id)){
			$sid = $row[0];
		}

		$rid = $_GET["rid"];
		$query = "INSERT INTO Review (rating, description, sID, item_ID, restaurant_ID, date_added) VALUES('$rating','$description','$sid','$iid','$rid', CURRENT_DATE())";
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

?>
	<section>
    <h2> <?php echo $msg; ?> </h2>

<form method="post" id="addForm">
<fieldset>
	<legend>Review Info:</legend>
    <p>
        <label for="rating">Rating:</label>
        <input type="number" min=0 max = 5 class="required" name="rating" id="rating" title="rating should be numeric">
    </p>


		<p>
				<label for="Item Name">Item Name(optional):</label>
				<input type="text" class="not_required" name="item_name" id="item_name">
		</p>


    <p>
        <label for="Description">Description:</label>
        <input type="text" class="required" name="description" id="description">
</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
</body>
</html>
