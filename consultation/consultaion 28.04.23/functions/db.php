<?php
function getConnection(): PDO|string|null
{
    static $db = null;
    if (is_null($db)) {
        try {
            $db = new PDO("pgsql:host=localhost;dbname=blog2;port=5432", "postgres", "1101", [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    return $db;
}
