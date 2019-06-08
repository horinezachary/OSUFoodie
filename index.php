<?php include "header.php" ?>

        <div>
          <h1>Home</h1>
       </br>
       <h3>Top 5 Restaurants:</h3>
          <?php
          // change the value of $dbuser and $dbpass to your username and password
             include 'connectvars.php';
          	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
          	if (!$conn) {
          		die('Could not connect: ' . mysql_error());
          	}

          // query to select all information from supplier table
          /*	$query = "SELECT * FROM Restaurant";*/
            $query = "SELECT Restaurant.restaurant_ID, Restaurant.restaurant_name AS Name, round(average,2) AS Average FROM Restaurant NATURAL JOIN (SELECT Review.restaurant_ID, avg(Review.rating) as average FROM Review GROUP BY restaurant_ID) AS R ORDER BY average DESC LIMIT 5";
            $result = mysqli_query($conn, $query);
            if (!$result) {
              die("Query to show fields from table failed");
            }
          // get number of columns in table
            $fields_num = mysqli_num_fields($result);
            echo "<table id='t01' border='1'><tr>";
            for($i=0; $i<$fields_num; $i++) {
          		$field = mysqli_fetch_field($result);
              if($field->name != "restaurant_ID"){
    						echo "<td><b>$field->name</b></td>";
    					}
          	}
            echo "</tr>\n";
          //	while($row = mysqli_fetch_row($result)) {
          	//	echo "<tr>";

          		// $row is array... foreach( .. ) puts every element
          		// of $row to $cell variable


              while($row = mysqli_fetch_array($result)){
      					echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>".$row[1]."</a></td>";
      					echo "<td>$cell<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>".$row[2]."</a></td>";
          		echo "</tr>\n";
          	}




            mysqli_free_result($result);
          	mysqli_close($conn);

          ?>


        </div>

  </body>
</html>
