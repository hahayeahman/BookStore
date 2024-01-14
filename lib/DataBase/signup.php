<?php


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
$name = $_POST['name'];
$dob = $_POST['dob'];
$password = $_POST['password'];

// Validate input
if (empty($name) || empty($dob) || empty($password)) {
    die(json_encode(['error' => 'All fields are required']));
}

// Check if the name is already registered
$sql = "SELECT * FROM users WHERE name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    die(json_encode(['error' => 'Name is already registered']));
}

// Insert new user into the database
$sql = "INSERT INTO users (name, dob, password) VALUES ('$name', '$dob', '$password')";
if ($conn->query($sql) === TRUE) {
    // Get the last inserted ID
    $last_id = $conn->insert_id;

    // Fetch the user from the database
    $result = $conn->query("SELECT * FROM users WHERE id = $last_id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
} else {
    echo json_encode(['error' => 'Error during signup: ' . $conn->error]);
}

// Close the connection
$conn->close();

?>
