<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM users
                    WHERE username = '%s'",
                    $mysqli->real_escape_string($_POST["username"]));
    
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
       if (password_verify($_POST["password"], $user["password_hash"])) {
           
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: connect.html");
            exit;

       }
    }

    $is_invalid = true;
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
  <title>OneChat - Sign In</title>
</head>
<body>

  <div class="signinbox">
  <p class="signintxt">Sign In</p>
    <form method="post">
      <p class="signintxt2">Username</p>
      <input type="text" name="username" id="username" placeholder="Username" maxlength="32" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
      <p class="signintxt2">Password</p>
      <input type="password" name="password" id="password" maxlength="255" placeholder="Password"/>
      <p></p>
      <button id="submit">Log In</button>
    </form>
    <!--- Add to CSS stylesheet --->
    <style>
    .bottomsignuptxt {
        color: white;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        text-align: center;
        font-weight: bold;
    }
    .bottomsignuptxta {
        color: black;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        text-align: center;
        font-weight: bold;
    }
    .bottomsignuptxta:hover {
        color: white;
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        text-align: center;
        font-weight: bold;
    }
    </style>
    <p class="bottomsignuptxt">If you don't have an account, sign up <a href="signup.html" class="bottomsignuptxta">here</a></p>
  </div>

</body>
</html>