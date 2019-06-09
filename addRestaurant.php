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
		$rname = mysqli_real_escape_string($conn, $_POST['rname']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$queryIn = "SELECT item_ID FROM Item where item_name = '$item_name'";
		$it_id = mysqli_query($conn,$queryIn);
		$fields_num = mysqli_num_fields($it_id);
		while($row = mysqli_fetch_array($it_id)){
			$iid = $row[0];
		}
		$queryIn = "SELECT owner_ID FROM Owner where Account_ID = $uid_in";
		$o_id = mysqli_query($conn,$queryIn);
		$fields_num = mysqli_num_fields($o_id);
		while($row = mysqli_fetch_array($o_id)){
			$oid = $row[0];
		}

		if($oid < 1){
					echo "in create owner";

					$queryAdd = "INSERT INTO Owner (Owner_ID, Owner_name, Account_ID) VALUES('$oid','$uname_in','$uid_in')";
					if(mysqli_query($conn, $queryAdd)){
									$msg =  "Record added successfully.<p>";
					} else{
									echo "ERROR: Could not able to execute $queryAdd." . mysqli_error($conn);
					}

			}

		$rid = $_GET["rid"];
		$query = "INSERT INTO Restaurant (restaurant_ID, restaurant_name, address, owner_id, avg_review) VALUES(UUID(),'$rname','$address','$oid',NULL)";
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

echo "<a href= 'account.php?rid=$rid&uid=$uid_in&uname=$uname_in'> Go Back</a>";
mysqli_close($conn);

?>
	<section>
    <h2> <?php echo $msg; ?> </h2>

<form method="post" id="addForm">
<fieldset>
	<legend>Review Info:</legend>
    <p>
        <label for="Restaurant Name">Restaurant Name:</label>
        <input type="text" min=0 max = 5 class="required" name="rname" id="rname">
    </p>


		<p>
				<label for="Address">Address:</label>
				<input type="text" class="not_required" name="address" id="address">

</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
</body>
</html>
