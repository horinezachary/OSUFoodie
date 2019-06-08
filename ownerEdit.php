<?php include "header.php" ?>

<?php
 $rid = $_GET["rid"];
 include 'connectvars.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
  die('Could not connect: ' . mysql_error());
}

 //get table with all items from ownerRestaurant
 $query = "SELECT item_ID, item_name FROM Item NATURAL JOIN (Restaurant NATURAL JOIN Owner) WHERE restaurant_ID = $rid ";
 $result = mysqli_query($conn,$query);
 $fields_num = mysqli_num_fields($result) + 1;
 echo "<table id='t01' border='1'><tr>";
 for($i=0; $i<$fields_num; $i++) {
   $field = mysqli_fetch_field($result);
   if($field->name != "restaurant_ID"){
     echo "<td><b>$field->name</b></td>";
   }
 }

   echo "</tr>\n";

 while($row = mysqli_fetch_array($result)){
   echo "<td>$cell<a>".$row[0]."</a></td>";
   echo "<td>$cell<a>".$row[1]."</a></td>";
   echo "<td>$cell<a href='deleteItem.php?rid=$rid&uid=$uid_in&uname=$uname_in&item_id=".$row[0]."'>"."X"."</a></td>";
 echo "</tr>\n";
}
echo "<a href='addItem.php?rid=$rid&uid=$uid_in&uname=$uname_in'>Add Item</a> ";


mysqli_free_result($result);
mysqli_close($conn);

?>


</body>
</html>
