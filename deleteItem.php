<?php
include 'connectvars.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
 die('Could not connect: ' . mysql_error());
}
$iid = $_GET["item_id"];
$rid = $_GET["rid"];
$uid = $_GET["uid"];
$uname_in = $_GET["uname"];
$query = "DELETE FROM Item WHERE item_ID = $iid";
if(mysqli_query($conn, $query)){
        $msg =  "Record removed successfully.<p>";
} else{
        echo "ERROR: Could not able to execute $query." . mysqli_error($conn);
}
echo "removed";


 echo "<a href= 'ownerEdit.php?rid=$rid&uid=$uid_in&uname=$uname_in'> Go Back</a>";


?>
