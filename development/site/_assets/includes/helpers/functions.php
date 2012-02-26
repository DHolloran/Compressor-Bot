<?php
// Require DB Info
require_once "db.inc.php";

// Connect to database
function connectDB(){
	// Give PDO global access
	global $pdo;
	// Create new PDO connection
	$pdo = new PDO($DB_DSN,$DB_USER,$DB_PASS);
}
