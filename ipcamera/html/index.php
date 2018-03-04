<?php
$cookie_name = "authorized";
$cookie_value = "False";
if (!isset($_COOKIE["authorized"])) {
	setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
}
?>


<!DOCTYPE html>
<html lang="en">

<script>

window.onload = function() {
    var image = document.getElementById("img");

    function updateImage() {
        image.src = image.src.split("?")[0] + "?" + new Date().getTime();
    }

    setInterval(updateImage, 500);
}
</script>
  <head>
    <meta charset="utf-8">
    <title>Thing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px;
      }
    </style>
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">IPCAMERA 5999 v1.2.4 Deluxe Edition</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="/">Live Feed</a></li>
              <li><a href="/login.php">Login</a></li>
              <li><a href="/command.php">Commands</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">

      <center>
	<h1>IPCAM 5999 v1.2.4 Deluxe Edition</h1>
	<h3>Location: Tom's house</h3>

	<img id="img" src="static/output.jpg?123"/>
</center>
    </div>
    
  </body>
</html>

