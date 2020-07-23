<?php
$servername="localhost";
$username = "root";
$password = "";
$database = "moviewebsitedb";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM movie";

$result = mysqli_query($conn, $sql);




?>
