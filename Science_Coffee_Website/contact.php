<?php
define('DB_USER', "zeynep");
define('DB_PASSWORD', "_-zkE451459413_-");
define('DB_DATABASE', "science_coffee_db");
define('DB_SERVER', "localhost");

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
    $response["messageType"] = "error";
    $response["messageHeader"] = "Failed to connect to database";
    $response["message"] = mysqli_connect_error();
    echo $response["message"];
    return;
} else {
    echo "Connected";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = $_POST['user_name'];
    $user_surname = $_POST['user_surname'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_message = $_POST['user_message'];
    echo "submited";

    $query = "INSERT INTO contact (user_name, user_surname, user_email, user_phone, user_message)
        VALUES ('$user_name', '$user_surname', '$user_email', '$user_phone', '$user_message')";
    echo "inserted";
    echo "Query: " . $query . "<br>" . mysqli_autocommit($con, true);;
    if (mysqli_query($con, $query)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}
