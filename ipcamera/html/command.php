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
              <li><a href="/login.php">Login</a></li>
              <li class="active"><a href="/command.php">Commands</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">

      <center>
<h6>
<?php
if (!isset($_COOKIE["authorized"]) || $_COOKIE["authorized"] != "True") {
        echo "<h1>You are not authorized!</h1>";
} else if (isset($_GET["command"])) {
        $command = $_GET["command"];
        $commands = array("help", "list", "config");
        $config = parse_ini_file("config.ini");

        $query = "help";
        if (substr($command, 0, strlen($query)) === $query) {
         echo "help - displays help<br>";
        echo "config - shows the configuration file<br>";
        echo "list - displays video log folders<br>";
        echo "list [folder_name] - displays log folder<br>";
      }
      $query = "config";
        if (substr($command, 0, strlen($query)) === $query) {
         $output = shell_exec("cat config.ini");
         echo $output;
      }
      $query = "list";
        if (substr($command, 0, strlen($query)) === $query) {
         $output = shell_exec("cd ".$config["logpath"].";".str_replace("list","ls",$command));
         echo $output;
      }
}

?>
</h6>

<?php if (isset($_COOKIE["authorized"]) && $_COOKIE["authorized"] == "True"): ?>

<body>
<div class="content">
    <form action="command.php" method="GET">
        <h6>Command (type help if you need help): </h6>
        <input name="command" type="text" size="50" autofocus/>
    </form>
</div>
</body>
<?php endif; ?>

</center>
    </div>

  </body>
</html>
