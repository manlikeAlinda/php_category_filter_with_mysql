<?php 
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "laravel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<div class='alert alert-success' role='alert'>Connection was Successfull!</div>";
}
?>