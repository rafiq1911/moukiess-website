#!/usr/bin/env php
<?php

echo "Waiting for MySQL to be ready...\n";

$maxAttempts = 30;
$attempt = 0;
$connected = false;

$host = getenv('MYSQLHOST') ?: getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('MYSQLPORT') ?: getenv('DB_PORT') ?: '3306';
$database = getenv('MYSQLDATABASE') ?: getenv('DB_DATABASE') ?: 'forge';
$username = getenv('MYSQLUSER') ?: getenv('DB_USERNAME') ?: 'forge';
$password = getenv('MYSQLPASSWORD') ?: getenv('DB_PASSWORD') ?: '';

echo "Connecting to: {$username}@{$host}:{$port}/{$database}\n";

while ($attempt < $maxAttempts && !$connected) {
    $attempt++;
    echo "Attempt {$attempt}/{$maxAttempts}...\n";
    
    try {
        $dsn = "mysql:host={$host};port={$port};dbname={$database}";
        $pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT => 5,
        ]);
        
        $connected = true;
        echo "✅ MySQL is ready!\n";
        exit(0);
    } catch (PDOException $e) {
        echo "❌ Connection failed: " . $e->getMessage() . "\n";
        
        if ($attempt < $maxAttempts) {
            echo "Waiting 2 seconds before retry...\n";
            sleep(2);
        }
    }
}

if (!$connected) {
    echo "❌ Failed to connect to MySQL after {$maxAttempts} attempts\n";
    echo "Please check:\n";
    echo "1. MySQL service is added to Railway project\n";
    echo "2. MySQL service is running (not crashed)\n";
    echo "3. Environment variables are set correctly\n";
    exit(1);
}
