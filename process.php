<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
    function get_data() {
        $datae = array();
        $datae[] = array(
            'Name' => $_POST['name'],
            'Userame' => $_POST['username'],
            'Age' => $_POST['age'],
            'Location' => $_POST['location'],
            'Gender' => $_POST['gender'],
            'IntrestOne' => $_POST['intrestone'],
            'IntrestTwo' => $_POST['intresttwo'],
            'IntrestThree' => $_POST['intrestthree'],
            'IntrestFour' => $_POST['intrestfour'],
            'FPOne' => $_POST['fpone'],
            'FPTwo' => $_POST['fptwo'],
            'FPThree' => $_POST['fpthree'],
            'FPFour' => $_POST['fpfour'],
            'FFOne' => $_POST['ffone'],
            'FFTwo' => $_POST['fftwo'],
            'FFThree' => $_POST['ffthree'],
            'FFFour' => $_POST['fffour'],
        );
        return json_encode($datae);
    }
      
    $name = $_POST['username'];
    $file_name = './userdata/' . $name . '.json';
    


    if(file_put_contents(
        "$file_name", get_data())) {
            
        }
    else {
        echo 'Error: Could not create JSON file';
    }
}

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (strlen($_POST["username"]) > 32) {
    die("Username must be under 32 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confrimation"]) {
    die("passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (name, email, username, password_hash)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                $_POST["name"],
                $_POST["email"],
                $_POST["username"],
                $password_hash);

if ($stmt->execute()) {
    header("Location: signupsuccess.html");
    exit;
} else {
    if ($mysqli->errno == 1062) {
        die("email already taken");
    } else {
    die($mysqli->error . " " . $mysqli->errno); 
    }
}

echo "Signup successful";
