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
	$msg = "";

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
		$query = "INSERT INTO Item (item_name, restaurant_ID) VALUES('$item_name', '$rid')";
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
<div class="container">
<div class="row">
<div class="col-lg-2">
</div>
<div class="col-lg-8">
	<section>
    <h2> <?php echo $msg; ?> </h2>

<form method="post" id="addForm">
<fieldset>
	<h4>Item:</h4>


		<div class="form-group">
				<label for="Item Name">Item Name:</label>
				<input type="text" class="form-control required" name="item_name" id="item_name">
		</div>
</fieldset>

		<div class="text-center">
	  	<button type="submit" value="Submit" class="btn btn-secondary" style="width:50%">Submit</button>
		<button type="reset" value="Clear Form" class="btn btn-secondary" style="width:49%">Clear Fields</button>
      </div>
</form>
</div>
</div>
</div>
</body>
</html>
                           
