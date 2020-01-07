<?php
$servername = "localhost";
$database = "arisan";
$username = "root";
$password = "";

$link_web = mysqli_connect($servername, $username, $password, $database);

if (!$link_web) {
    die("Koneksi gagal: " . mysqli_connect_error());
}