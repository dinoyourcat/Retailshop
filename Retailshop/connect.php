<?php
// เชื่อมต่อกับฐานข้อมูล MySQL
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'tatcshop';
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}