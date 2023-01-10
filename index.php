<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="style/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
  <title>OneChat</title>
</head>
<body>
  <div class="mainbox"></div>
  <p class="main">OneChat</p>
  <button type="button" class="button" method="post"><a href="signin.php" class="signlink">Start</a></button>

  <p class="bottomhyperlinks"><a href="about.html" class="extbottom1">About</a></p>
  <p class="bottomhyperlinks"><a href="contact.html" class="extbottom2">Feedback</a></p>



</body>
</html>