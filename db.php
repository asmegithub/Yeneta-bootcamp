<?php
$conn = new mysqli("localhost", "root", "mysql2123", "YenetasProject");
if ($conn->connect_error) {
    echo die("Connection failed: " . $conn->connect_error);
}