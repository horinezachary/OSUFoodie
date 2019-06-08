<div>
   <h3>Your Reviews:</h3>
     <?php
     // query to select all information from supplier table
        $query = "SELECT Restaurant.restaurant_ID, Restaurant.restaurant_name AS 'Restaurant', Review.rating AS 'Rating', Review.description AS 'Description', Item.item_name AS 'Item' FROM Review INNER JOIN Item on Review.item_ID = Item.item_ID INNER JOIN Restaurant ON Restaurant.restaurant_ID = Review.restaurant_ID NATURAL JOIN Student WHERE Student.Account_ID = $aid";
     // Get results from query
        $result = mysqli_query($conn, $query);
        if (!$result) {
           die("Query to show fields from table failed");
        }
     // get number of columns in table
        $fields_num = mysqli_num_fields($result);
        echo "<table id='t01' border='1'><tr>";

     // printing table headers
        for($i=0; $i<$fields_num; $i++) {
           $field = mysqli_fetch_field($result);
           if($field->name != "restaurant_ID"){
             echo "<td><b>$field->name</b></td>";
           }
        }
        echo "</tr>\n";
        while($row = mysqli_fetch_row($result)) {
           echo "<tr>";
           echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[1]</a></td>";
           echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[2]</a></td>";
           echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[3]</a></td>";
           echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>$row[4]</a></td>";
           echo "</tr>\n";
        }

        mysqli_free_result($result);
     ?>
