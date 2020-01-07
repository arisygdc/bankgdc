<?php
$servername = "localhost";
$database = "bankgdc";
$username = "root";
$password = "";

$link_bank = mysqli_connect($servername, $username, $password, $database);

if (!$link_bank) {
    die("Koneksi gagal: " . mysqli_connect_error());
}