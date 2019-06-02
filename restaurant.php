<!DOCTYPE html>
<?php
		$currentpage="Restaurant";
		include "pages.php";
?>
<html>
	<head>
		<title><?php $_GET("Rname");?></title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>


<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php';
	include 'header.php';

   //put stuff hebrev



   include 'review.php';

?>
