<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");

if (isset($_SESSION["username"])) {
    $isAdding = $_POST["isAdding"] === "true";
    $amount = intval($_POST["amount"]);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "canteen";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Update the card count in the database
    $email = $_SESSION["username"];
    $operation = $isAdding ? "card + $amount" : "card - 1";
    $sql = "UPDATE users SET card = $operation WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to update card count"]);
    }
} else {
    echo json_encode(["success" => false, "error" => "User is not logged in"]);
}
?>