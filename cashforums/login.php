<?php
   $msg = "";
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $conn = mysqli_connect("localhost","sql-user","givemeflags","cashforums");

     if(! $conn ) {
        $msg = ('Could not connect: ' . mysqli_error($conn));
     }

     $username = $_POST["username"];
     $password = $_POST["password"];

     $sql = 'SELECT * FROM users WHERE (username="' . $username . '") AND (password = "' . $password . '")';
     //echo $sql;
     mysqli_select_db('cashforums');
     $retval = mysqli_query( $conn, $sql );

     if(! $retval ) {
        $msg = (mysqli_error($conn));
     }
     else {
         $row = mysqli_fetch_assoc($retval);
         if (!$row) {
              $msg = "no users found";
         } else {
              session_start();
              $msg = "you have logged in as " . $row["username"];
              $_SESSION["username"] = $row["username"];
              header('Refresh: 1; URL=/');
         }
     }
     mysqli_close($conn);
  }
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Cash Forums - Login</title>

    <link rel="stylesheet" href="static/logincss.css" media="screen" type="text/css" />

</head>

<body>

<br>
  <div class="login-card">
    <h1>Login</h1><br>
    <div style="color:red;"><?php echo $msg; ?></div>
  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>

  <div class="login-help">
    <a href="/">Back to main page</a>
  </div>
</div>



</body>

</html>
