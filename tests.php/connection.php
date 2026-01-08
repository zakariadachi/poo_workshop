<?php
require_once '/../src/core/database.php';

try {
    $pdo = Database::getConnection();
    echo "✅ Connexion réussie!";
} catch (PDOException $e) {
    echo "❌ Erreur: " . $e->getMessage();
}