<?php

require_once __DIR__ . '/../src/Entities/Book.php';
require_once __DIR__ . '/../src/Entities/Author.php';

echo "=== TESTS UNITAIRES BASIQUES ===\n\n";

// Test 1 : Création d'un auteur
echo "Test 1 (Author) : ";
$author = new Author("Martin Fowler");
if ($author->getName() === "Martin Fowler") {
    echo "✅ SUCCÈS\n";
} else {
    echo "❌ ÉCHEC\n";
}

// Test 2 : Création d'un livre
echo "Test 2 (Book) : ";
$book = new Book(1, "Refactoring", "Martin Fowler", 50.00, 3);
if ($book->getTitle() === "Refactoring" && $book->getPrice() == 50.00) {
    echo "✅ SUCCÈS\n";
} else {
    echo "❌ ÉCHEC\n";
}

// Test 3 : Modification du stock
echo "Test 3 (Stock) : ";
$book->setStock(10);
if ($book->getStock() === 10) {
    echo "✅ SUCCÈS\n";
} else {
    echo "❌ ÉCHEC\n";
}

echo "\n=== FIN DES TESTS ===\n";
