<?php
   include "header.php"
?>

	<div>
   </br>
		<?php
		// change the value of $dbuser and $dbpass to your username and password
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

         echo "<h2>$rname</h2>";
         echo "<h6>$raddr</h6>";
         echo "<h6>Average Rating: $review</h6>";
         echo "</br>";
         echo "<h3>Reviews:</h3>";
         include "review.php";
         echo "<a href='addReview.php?rid=$rid&uid=$uid_in&uname=$uname_in'>Write Review</a> ";
         include "menu.php";

         mysqli_free_result($result);
         echo "</br>";
         echo "<h3>Menu:</h3>";
         mysqli_close($conn);
          ?>
   </div>
   </body>
</html>
