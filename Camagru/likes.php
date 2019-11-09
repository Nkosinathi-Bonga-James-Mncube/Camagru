<?php
start_session();
include "config/database.php";
include_once "config/connection.php";
$pdo = DB_Connection( $DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD);
$sql = 'SELECT * FROM likes WHERE verf_no =?';
$stmt = $pdo->prepare($sql);
$stmt = execute($_SESSION['verf_no']);
?>