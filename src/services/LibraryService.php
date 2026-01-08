<?php

require_once __DIR__ . '/../Repositories/BookRepository.php';

class LibraryService {
    private $repository;

    public function __construct() {
        $this->repository = new BookRepository();
    }

    public function displayBooks() {
        $books = $this->repository->findAll();
        
        if (empty($books)) {
            echo "Aucun livre trouvé dans la librairie.\n";
        } else {
            foreach ($books as $book) {
                echo "Livre #" . $book->getId() . " : " . $book->getTitle() . " par " . $book->getAuthorName() . " (" . $book->getPrice() . "€, Stock: " . $book->getStock() . ")\n";
            }
        }
    }

    // Ajouter
    public function addBook($title, $author, $price, $stock) {
        if (empty($title)) {
            echo "Erreur : Le titre est obligatoire.\n";
            return false;
        }
        
        if (empty($author)) {
            echo "Erreur : L'auteur est obligatoire.\n";
            return false;
        }

        if ($price < 0) {
            echo "Erreur : Le prix ne peut pas être négatif.\n";
            return false;
        }

        // Créer de l'objet
        $newBook = new Book(0, $title, $author, $price, $stock);
        $this->repository->add($newBook);
        
        echo "Le livre '" . $title . "' a été ajouté avec succès !\n";
        return true;
    }

    // Rechercher via titre
    public function searchBook($title) {
        $book = $this->repository->findByTitle($title);
        
        if ($book) {
            echo "Livre trouvé -> " . $book->getTitle() . " par " . $book->getAuthorName() . $price->getPrice() . "\n";
            return $book;
        } else {
            echo "Aucun livre trouvé avec le titre " . $title . ".\n";
            return null;
        }
    }
}
