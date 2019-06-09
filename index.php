<?php include "header.php" ?>

        <div class="text-center">
          <img style="width:100%" src="https://www.chris-schuster.com/pics/panoramas/valleylibrarypano2.jpg" class="img-fluid" alt="Responsive image">
          <p style="text-align:center;">OSUFoodie is a student-run restaurant review site. We built a safe environment so students can find what they want to eat!</p>
       <h6>Top 5 Rated Restaurants In Corvallis:</h6>
       <br>
          <?php
          // change the value of $dbuser and $dbpass to your username and password
             include 'connectvars.php';
          	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
          	if (!$conn) {
          		die('Could not connect: ' . mysql_error());
          	}

          // query to select all information from supplier table
          /*	$query = "SELECT * FROM Restaurant";*/
            $query = "SELECT Restaurant.restaurant_ID, Restaurant.restaurant_name AS Name, Restaurant.address, round(average,2) AS Average FROM Restaurant NATURAL JOIN (SELECT Review.restaurant_ID, avg(Review.rating) as average FROM Review GROUP BY restaurant_ID) AS R ORDER BY average DESC LIMIT 5";
            $result = mysqli_query($conn, $query);
            if (!$result) {
              die("Query to show fields from table failed");
            }
          // get number of columns in table
            $fields_num = mysqli_num_fields($result);
            echo "<div class='container'><div class='row'><div class='col-lg-1'></div>";
          //	while($row = mysqli_fetch_row($result)) {
          	//	echo "<tr>";

          		// $row is array... foreach( .. ) puts every element
          		// of $row to $cell variable


              while($row = mysqli_fetch_array($result)){
                echo "<div class='col-sm-2 border rounded' style='padding:5px;'>";
                echo "<a href='singleRestaurant.php?rid=$row[0]&uid=$uid_in&uname=$uname_in'>".$row[1]."</a>";
                echo "<p>".$row[2]."</p>";
                echo "<a><strong>".$row[3]."</strong></a>";
                echo "</div>";
          		echo "</tr>\n";
          	}




            mysqli_free_result($result);
          	mysqli_close($conn);

          ?>


        </div>

  </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         