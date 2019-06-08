<html>
	<head>
		<title>Create Account</title>
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
        $queryIn3 = "SELECT * FROM Student where Student.sname='$fname' ";
        $queryIn3 = "SELECT * FROM Student where Student.sID='$sid' ";
        $resultIn = mysqli_query($conn, $queryIn);
        $resultIn2 = mysqli_query($conn, $queryIn2);
        $resultIn3 = mysqli_query($conn, $queryIn3);
        $resultIn4 = mysqli_query($conn, $queryIn4);
		if (mysqli_num_rows($resultIn)> 0 || mysqli_num_rows($resultIn2)> 0 || mysqli_num_rows($resultIn3)> 0 || mysqli_num_rows($resultIn4)> 0) {
            $msg = "<h2>Account already created</h2>";		
        } else {
            $query = "INSERT INTO Account(Account_ID, Username, Password) VALUES ('$sid', '$uname', '$pw')";
            $query2 = "INSERT INTO Student(sID, sname, Account_ID) VALUES ('$sid', '$fname', '$sid')";
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
	<section>
    <h2> <?php echo $msg; ?> </h2>

<form method="post" id="addForm">
<fieldset>
	<legend>Create Account:</legend>
    <p>
        <label for="sID">Student ID:</label>
        <input type="number" min=1 max = 999999 class="required" name="sid" id="sid" title="sid should be numeric">
    </p>
    <p>
        <label for="Name">Full Name:</label>
        <input type="text" class="required" name="fname" id="fname">
    </p>
    <p>
        <label for="Name">Username:</label>
        <input type="text" class="required" name="uname" id="uname">
    </p>
    <p>
        <label for="Name">Password:</label>
        <input type="text" class="required" name="pw" id="pw">
    </p>
</fieldset>
      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
</body>
</html>