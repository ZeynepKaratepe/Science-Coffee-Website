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

    $reservation_date = $_POST['date'];
    $booker_name = $_POST['name'];
    $booker_email = $_POST['email'];
    $booker_phone = $_POST['phone'];
    $guest_number = $_POST['partySize'];
    echo "submited";

    $query = "INSERT INTO reservation (reservation_date, booker_name, booker_email, booker_phone, guest_number)
        VALUES ('$reservation_date', '$booker_name', '$booker_email', '$booker_phone', '$guest_number')";
    echo "inserted";
    echo "Query: " . $query . "<br>" . mysqli_autocommit($con, true);
    if (mysqli_query($con, $query)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}
