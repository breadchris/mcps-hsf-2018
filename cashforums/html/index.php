<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Cash Royale Forums</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content=" Sub Forums with bootstrap 3.2 " />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->






<link href="static/theme.css" type="text/css" rel="stylesheet">

        <!-- CSS code from Bootply.com editor -->

        <style type="text/css">
            /* CSS used here will be applied after bootstrap.css */
#post-topic{

}
        </style>
    </head>

    <!-- HTML code from Bootply.com editor -->

    <body>

        <div class="container">
  <div class="row">
      <section class="panel panel-info">
          <header class="panel-heading">
  <!-- <h3>Cash Forums</h3> -->
  <img src="logo.png" width="300">
  <div align="right">
  <?php
  session_start();
  if (isset($_SESSION["username"])) {
    echo '<h6><a href="/leaderboards.php">Leaderboards</a></h6> | <h6><a href="/profile.php?user='.$_SESSION["username"].'">Profile</a></h6> | <h6><a href="/logout.php">Logout</a></h6>';
  } else {
    echo '<h6><a href="/leaderboards.php">Leaderboards</a></h6> | <h6><a href="/login.php">Login</a></h6> | <h6><a href="/register.php">Register</a></h6>';
  }
  ?>
  </div>
  </header>

<?php
   $conn = mysqli_connect("localhost","sql-user","givemeflags","cashforums");

   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   $retval = mysqli_query($conn, 'SELECT * FROM threads');

   if(! $retval ) {
      die (mysqli_error($conn));
   }

   $template = '<section class="row panel-body">
            <section class="col-md-6">
              <h4> <a href="/thread.php?id=%s"><i class="glyphicon glyphicon-th-list"> </i> %s </a></h4> <hr>
              <h6> %s </h6>

            </section>
            <section class="col-md-2">
              <ul id="post-topic">
                <li class="list-unstyled"> Posts: %d </li>
              </ul>
            </section>
            <section class="col-md-3">
              <h4> <i class="glyphicon glyphicon-link"> </i> %s </h4> <hr>
              <i class="glyphicon glyphicon-user"></i> %s <br>
            </section>
            </section>';
   while ($row = mysqli_fetch_assoc($retval)) {
        $threadid = $row["id"];
        $allposts = mysqli_query($conn, "SELECT * FROM posts WHERE id=".$threadid);
        $numposts = 0;
        while ($row2 = mysqli_fetch_assoc($allposts)) {
            $numposts = $numposts + 1;
        }
        $lastpost = mysqli_query($conn, "SELECT * FROM posts WHERE id=".$threadid." ORDER BY postid DESC LIMIT 1");
        $row2 = mysqli_fetch_assoc($lastpost);
        $username = $row2["username"];
        $header = $row2["header"];
        $body = $row2["body"];
        $forumname = $row["name"];
        echo sprintf($template, $threadid, $forumname, $body, $numposts, $header, $username);
   }

   mysqli_close($conn);
?>

 </div>
</div>

        <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>


        <script type='text/javascript' src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>







        <!-- JavaScript jQuery code from Bootply.com editor  -->

        <script type='text/javascript'>

        $(document).ready(function() {



        });

        </script>



        <style>
            .ad {
              position: absolute;
              bottom: 70px;
              right: 48px;
              z-index: 992;
              background-color:#f3f3f3;
              position: fixed;
              width: 155px;
              padding:1px;
            }

            .ad-btn-hide {
              position: absolute;
              top: -10px;
              left: -12px;
              background: #fefefe;
              background: rgba(240,240,240,0.9);
              border: 0;
              border-radius: 26px;
              cursor: pointer;
              padding: 2px;
              height: 25px;
              width: 25px;
              font-size: 14px;
              vertical-align:top;
              outline: 0;
            }

            .carbon-img {
              float:left;
              padding: 10px;
            }

            .carbon-text {
              color: #888;
              display: inline-block;
              font-family: Verdana;
              font-size: 11px;
              font-weight: 400;
              height: 60px;
              margin-left: 9px;
              width: 142px;
              padding-top: 10px;
            }

            .carbon-text:hover {
              color: #666;
            }

            .carbon-poweredby {
              color: #6A6A6A;
              float: left;
              font-family: Verdana;
              font-size: 11px;
              font-weight: 400;
              margin-left: 10px;
              margin-top: 13px;
              text-align: center;
            }
        </style>


    </body>
</html>
