<div>
   <?php
   // query to select all information from supplier table
   /*	$query = "SELECT * FROM Restaurant";*/
      $query = "SELECT Restaurant.restaurant_ID, Restaurant.restaurant_name AS Name, Restaurant.address AS Address, avg_review as Average FROM Restaurant WHERE owner_ID = $oid";
      $restaurants = mysqli_query($conn, $query);
      if (!$restaurants) {
         die("Query to show fields from table failed");
      }
   // get number of columns in table
      $fields_num = mysqli_num_fields($restaurants);
      echo "<table class='table table-bordered table-hover table-condensed' id='t01' border='1'><tr>";
      for($i=0; $i<$fields_num; $i++) {
            $field = mysqli_fetch_field($restaurants);
            if($field->name != "restaurant_ID"){
               echo "<td><b>$field->name</b></td>";
            }
      }
      echo "<td><b>Delete</b></td>";
      echo"</tr>\n";
      while($row = mysqli_fetch_array($restaurants)){
         echo "<td>$cell<a href='ownerEdit.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[1]</a></td>";
         echo "<td>$cell<a href='ownerEdit.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[2]</a></td>";
         echo "<td>$cell<a>$row[3]</a></td>";
         echo "<td>$cell<a href='deleteRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>Delete</a></td>";
         echo "</tr>\n";
      }
      echo "</table>";
      mysqli_free_result($restaurants);
   ?>


</div>
      
