<?php
	$username=$_POST['username'];
	$password=$_POST['password'];

$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
					
$sql = "INSERT INTO utenti (username, password)
VALUES ($username, $password)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>