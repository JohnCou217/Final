<?php
    $servername = "localhost";
    $database = "Escuelav2";
    $username = "root";
    $password = "";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->error());
    }
?>