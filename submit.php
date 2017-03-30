<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_boutique";
$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST["name"];
$address = $_POST["address"];
$email = $_POST["email"];
$gender = $_POST["gender"];


// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 

$sql = "INSERT INTO `customer` (`cust_name`, `address`, `gender`, `email`) 
VALUES ('$name', '$address', '$gender', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	header('Location: congrats.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>