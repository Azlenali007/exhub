<?php
/**
 * PDO Database Connection Provider
 */

function getDbConnection(): ?PDO {
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    $dbConfig = require __DIR__ . '/../config/database.php';

    $dsn = "mysql:host={$dbConfig['host']};port={$dbConfig['port']};dbname={$dbConfig['dbname']};charset={$dbConfig['charset']}";

    try {
        $pdo = new PDO($dsn, $dbConfig['user'], $dbConfig['password'], $dbConfig['options']);
        return $pdo;
    } catch (PDOException $e) {
        // Return null or handle gracefully if DB is not yet installed
        error_log("Database connection failed: " . $e->getMessage());
        return null;
    }
}
