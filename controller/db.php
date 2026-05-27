<?php
function getDB(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $dbFile = __DIR__ . '/../data_base/ecocity.db';

    if (!file_exists($dbFile)) {
        throw new RuntimeException("Database file not found: $dbFile");
    }

    $dsn = 'sqlite:' . $dbFile;
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec('PRAGMA foreign_keys = ON');

    return $pdo;
}

?>
