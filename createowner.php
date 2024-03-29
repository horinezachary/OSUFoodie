<html>
	<head>
		<title>Create Owner Account</title>
		<link rel="stylesheet" href="index.css">
		<script type = "text/javascript"  src = "verifyInput.js" > </script>
	</head>
<body>

<?php
	include "header.php";
	include 'connectvars.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sid = mysqli_real_escape_string($conn, $_POST['sid']);
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $pw = mysqli_real_escape_string($conn, $_POST['pw']);
        $queryIn = "SELECT * FROM Account where Account.Account_ID='$sid' ";
        $queryIn2 = "SELECT * FROM Account where Account.Username='$uname' ";
        $queryIn3 = "SELECT * FROM Student where Owner.Owner_name='$fname' ";
        $queryIn3 = "SELECT * FROM Student where Owner.Owner_ID='$sid' ";
        $resultIn = mysqli_query($conn, $queryIn);
        $resultIn2 = mysqli_query($conn, $queryIn2);
        $resultIn3 = mysqli_query($conn, $queryIn3);
        $resultIn4 = mysqli_query($conn, $queryIn4);
		if (mysqli_num_rows($resultIn)> 0 || mysqli_num_rows($resultIn2)> 0 || mysqli_num_rows($resultIn3)> 0 || mysqli_num_rows($resultIn4)> 0) {
            $msg = "<h2>Account already created</h2>";
        } else {
            $query = "INSERT INTO Account(Account_ID, Username, Password) VALUES ('$sid', '$uname', '$pw')";
            $query2 = "INSERT INTO Owner(Owner_name, Account_ID) VALUES ('$fname', '$sid')";
			if(mysqli_query($conn, $query) && mysqli_query($conn, $query2)){
				echo "<script>window.location = 'account.php?uid=$sid&uname=$uname'</script>";
			} else{
				echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
			}
		}
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
	<h4>Create Owner Account:</h4>
    <div class="form-group">
        <label for="sID">Account ID:</label>
        <input type="number" min=1 max = 999999 class="form-control required" name="sid" id="sid" title="sid should be numeric">
    </div>
    <div class="form-group">
        <label for="Name">Full Name:</label>
        <input type="text" class="form-control required" name="fname" id="fname">
    </div>
    <div class="form-group">
        <label for="Name">Username:</label>
        <input type="text" class="form-control required" name="uname" id="uname">
    </div>
    <div class="form-group">
        <label for="Name">Password:</label>
        <input type="text" class="form-control required" name="pw" id="pw">
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
</html>        
