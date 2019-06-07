<?php
   include "header.php";
?>


      <?php
      // change the value of $dbuser and $dbpass to your username and password
          include 'connectvars.php';
          if (!$_GET["aid"]) {
            $aid = $uid_in;
          }
          else {
            $aid = $_GET["aid"];
          }
           $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
           if (!$conn) {
              die('Could not connect: ' . mysql_error());
           }
          $query = "SELECT Student.sID, Student.sname AS Name, Account.Username AS Username FROM Student INNER JOIN Account ON Student.Account_ID = Account.Account_ID WHERE Account.Account_ID = $aid";
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
             $sid = $row[0];
             $sname = $row[1];
             $uname = $row[2];
          //echo "</tr>\n";
          }
          echo "<div>";
             if (!$_GET["aid"]) {
                 echo "<h2>Your Account</h2>";
             }
             else {
                echo "<h2>$uname's Account</h2>";
             }
         echo "</div></br>";

          echo "<h6>Full Name: $sname</h6>";
          echo "<h6>Username: $uname</h6>";
          echo "<h6>Student ID: $sid</h6>";
          echo "</br>";
           ?>



       <?php include "studentReviews.php";?>
    </body>
</html>
