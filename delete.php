<?php
include 'header.php' ?>
<?php
    include 'connectvars.php';
    $red = $_GET['review_id'];
    $u = $_GET['uid'];
    $name = $_GET['uname'];
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
			die('Could not connect: ' . mysql_error());
	}
    $query = "DELETE FROM Review where Review_ID = $red";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query failed on delete");
    }

   echo "<script>window.location = 'account.php?uid=$u&uname=$name'</script>"

?>
