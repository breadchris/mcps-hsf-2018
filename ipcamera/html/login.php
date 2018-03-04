<!DOCTYPE html>
<html>
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
              <li><a href="/">Live Feed</a></li>
              <li class="active"><a href="/login.php">Login</a></li>
              <li><a href="/command.php">Commands</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>




<?php if (isset($_COOKIE["authorized"]) && $_COOKIE["authorized"] == "True") : ?>

<div class="container">

      <center>
        <h1>You are already logged in!</h1>

</center>
    </div>

    

<?php elseif (isset($_GET["username"]) && isset($_GET["password"])): ?>
<center>
<?php
$username = $_GET["username"];
$password = $_GET["password"];
echo "<h1> Unauthorized. </h1>";

?>
</center>

<?php else: ?>

<div class="container">

      <center>
        <div class="content">
    <form action="login.php" method="GET">
        <label>Username: </label>
        <input name="username" type="text" size="25" />

        <label>Password: </label>
        <input name="password" type="text" size="25" />
        <br>
        <input type="submit" value="Submit!" />
    </form>
    </center>
</div>

<?php endif; ?>





    </div>

  </body>
</html>
