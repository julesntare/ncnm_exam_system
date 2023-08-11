<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "ncnm_db";
$conn = null;

try {
  $conn = new PDO("mysql:host={$host};dbname={$db};", $user, $pass);
} catch (Exception $e) {
  echo "No connection on Db server";
}