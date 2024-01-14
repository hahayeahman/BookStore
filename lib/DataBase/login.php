<?php

// Database configuration
$servername = "localhost:3306";
$username = "projectuniversity541";
$password = "ThisIsYou";
$dbname = "id21758671_bookstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST data
$username = $_POST['username'];
$password = $_POST['password'];

// Validate input
if (empty($username) || empty($password)) {
    die(json_encode(['error' => 'Username and password are required']));
}

// Check if the username and password match a user in the database
$sql = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, return user data
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // User not found
    echo json_encode(['error' => 'Invalid username or password']);
}

// Close the connection
$conn->close();

?>
