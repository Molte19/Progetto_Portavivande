<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "progettomaturita";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
					
$sql = "UPDATE magazzino 
SET quantita = quantita + '{$_POST['quantita']}'
WHERE nome = '{$_POST['bevanda']}'";

if ($conn->query($sql) === TRUE) {
    echo "Record modify successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>