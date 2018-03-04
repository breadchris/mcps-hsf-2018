<?php
$cookie_name = "nothing_here";
$cookie_value = "flag{cookiezi?_cookeasy?_cook1es!}";
if (!isset($_COOKIE["nothing_here"])) {
        setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
}
?>

<!DOCTYPE html>




<html lang="en">
<title>Tom's Blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {
  font-family: "Times New Roman", Georgia, Serif;
  font-size: 24px;
}
h1,h2,h3,h4,h5,h6 {
  font-weight:450;
    font-family: "Times New Roman";
    letter-spacing: 3px;
}
a { text-decoration : none; color : #000; }
</style>
<body>

<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
    <a href="#" class="w3-bar-item w3-button">Tom's Blog</a>
    <div class="w3-right w3-hide-small">
      <a href="#" class="w3-bar-item w3-button">About</a>
      <a href="/posts.html" class="w3-bar-item w3-button">Posts</a>
    </div>
  </div>
</div>

<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
  <img class="w3-image" src="https://png.pngtree.com/thumb_back/fh260/back_pic/00/04/14/045621d4a7219bf.jpg" alt="bgimage" width="1600" height="800">
</header>
<br>
<center>
  <h1>Posts</h1>
</center>

<div class="w3-content" style="max-width:1100px">
<div class="w3-container w3-padding-64" id="post4">
    <h1>Information</h1><br>
    <p>I'm Tom Wrooner</p>
    <p>I'm Mank Steppe's second favorite student! Who's his first? <br></br>...everyone else.</p>
    <p>Anyways, I've found about this type of competition called capture-the-flag, where you essentially hack your way to a flag! They're really awesome, so I've set up a couple flags on my blog for you guys as a bit of a mini challenge. See if you can find them all!</p>
    <p>Here is what flags look like and also your first flag: flag{l3t_th3_g4me_beg1n}</p>
  </div>
  
</div>


<footer class="w3-center w3-light-grey w3-padding-32">
  <p>"Smiling is a waste of time!"<br></br>- A very, very wise man (me).</p>
</footer>

</body>
</html>

