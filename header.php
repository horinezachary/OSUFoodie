<!DOCTYPE html>
<?php
		$currentpage="Home";
		include "pages.php";
    $uid_in = $_GET["uid"];
    $uname_in = $_GET["uname"];
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OSUFoodie</title>
    <script type = "text/javascript"  src = "verifyInput.js" > </script>
  <link href = "index.css" rel = "stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

      <div class="logo_header">
      <h2 class="logo">Logo</h2>
		<?php
		if (!$uid_in || !$uname_in) {
       	echo "<a class='login' href='login.php'>Login</a>";
	 	}
		else {
			echo "<a class='login' href='index.php'>Logout</a>";
		}
		?>
       <h2 class="current_page">OSU Foodie</h2>
      </div>


          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="d-md-flex d-block flex-row mx-md-auto mx-0">

            <ul class="navbar-nav mr-auto">
					<?php

							foreach ($content as $page => $location){
            echo  "<li class='nav-item'>
                <div class='nav-link'> <a href='$location?uid=$uid_in&uname=$uname_in'> $page <span class='sr-only'>$page</span></a></div>
              </li>";

						}?>

            </ul>
          </div>
          </div>
        </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
