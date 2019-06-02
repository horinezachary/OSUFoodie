<?php
	include 'connectvars.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	$account_id = 111111;
	$sname = mysqli_query($conn, "SELECT `Username` FROM `Account` WHERE Account_ID = $account_id");
	if (!$sname) {
		die("Query to show fields from table failed");
	}
?>

	<header>
		OSU Foodie - <em> Welcome <span id="username"><?php echo $sname;?></span>!</em>
	</header>
	<nav>
		<ul>
		<?php
		foreach ($content as $page => $location){
			echo "<li><a href='$location?user=".$user."' ".($page==$currentpage?" class='active'":"").">".$page."</a></li>";
		}
		?>
		</ul>

	</nav>
