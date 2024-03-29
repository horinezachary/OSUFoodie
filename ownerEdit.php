<?php include "header.php" ?>

<div class="container">
<div class="row">
<?php
 $rid = $_GET["rid"];
 include 'connectvars.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
  die('Could not connect: ' . mysql_error());
}
$rid = $_GET["rid"];
$query = "SELECT Restaurant.restaurant_ID, Restaurant.restaurant_name AS Name, Restaurant.address AS Address, avg_review as Average FROM Restaurant WHERE Restaurant.restaurant_ID = $rid";
$result = mysqli_query($conn, $query);
if (!$result) {
   die("Query to show fields from table failed");
}

// get number of columns in table
$fields_num = mysqli_num_fields($result);
while($row = mysqli_fetch_array($result)){
   //echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&rname=$row[1]&uid=$uid_in&uname=$uname_in'>".$row[1]."</a></td>";
   //echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&rname=$row[1]&uid=$uid_in&uname=$uname_in'>".$row[2]."</a></td>";
   //echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&rname=$row[1]&uid=$uid_in&uname=$uname_in'>".$row[3]."</a></td>";
   $rname = $row[1];
   $raddr = $row[2];
   $review = $row[3];
//echo "</tr>\n";
}
echo "<div class='col-md-2'>";
echo "<br>";
echo "<div class='border rounded' style='padding:5px'>";
echo "<h2>$rname</h2>";
echo "<h6>$raddr</h6>";
echo "<h6>Average Rating: $review</h6>";
echo "</div>";
echo "</div>";
echo "<div class='col-md-5'>";
echo "<br>";
echo "<h3>Menu</h3>";
 //get table with all items from ownerRestaurant
 $query = "SELECT item_ID, item_name FROM Item NATURAL JOIN (Restaurant NATURAL JOIN Owner) WHERE restaurant_ID = $rid ";
 $result = mysqli_query($conn,$query);
 $fields_num = mysqli_num_fields($result);
 echo "<table class='table table-bordered table-hover table-condensed' id='t01' border='1'><tr>";
 for($i=0; $i<$fields_num; $i++) {
   $field = mysqli_fetch_field($result);
   if($field->name != "item_ID"){
     echo "<td><b>$field->name</b></td>";
  }
 }
 echo "<td><b>Delete</b></td>";

   echo "</tr>\n";

 while($row = mysqli_fetch_array($result)){
   echo "<td>$cell<a href='item.php?itemid=$row[0]&uid=$uid_in&uname=$uname_in'>".$row[1]."</a></td>";
   echo "<td>$cell<a href='deleteItem.php?rid=$rid&uid=$uid_in&uname=$uname_in&item_id=".$row[0]."'>Delete</a></td>";
 echo "</tr>\n";
}
echo "</table>";
echo "<button class='btn btn-secondary'><a style='color:white;' href='addItem.php?rid=$rid&uid=$uid_in&uname=$uname_in'>Add Item</a></button>";
echo "</div>";
mysqli_free_result($result);
echo "<div class='col-md-3'>";
echo "<br>";
echo "<h3>Reviews</h3>";
include "review.php";
mysqli_close($conn);

?>

</div>
</div>
</div>
</body>
</html>
                                                                                         