<?php
$data = readline("Masukkan data: ");

preg_match('/(?P<name>.*) (?P<age>\d+)(?: ?THN| ?TH| ?TAHUN)? (?P<city>.*)/', $data, $matches);

$name = strtoupper($matches['name']);
$age = $matches['age'];
$city = strtoupper($matches['city']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arkatama_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Tambahkan $createAt jika tabel identitas tidak memiliki kolom create_at
// $createAt = date('Y-m-d H:i:s');

$sql = "INSERT INTO identity (name, age, city) VALUES ('$name', '$age', '$city')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . " : " . $conn->error;
}

$conn->close();