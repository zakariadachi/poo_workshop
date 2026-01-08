<?php

require_once __DIR__ . '/../Core/database.php';
require_once __DIR__ . '/../Entities/Book.php';

class BookRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function findAll() {
        $sql = "SELECT * FROM book";
        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll();
        
        $books=[];
        foreach ($rows as $row) {
            $books[] = new Book(
                $row['id'],
                $row['title'],
                $$row['author_name'],
                $row['price'],
                $row['stock'],
            );
        }
        
        return $books;
    }



    // find
    public function findByTitle($title) {
        $sql = "SELECT * FROM book WHERE title = :title";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['title' => $title]);
        $row = $stmt->fetch();

        if ($row) {
            return new Book(
                $row['id'],
                $row['title'],
                $row['author_name'],
                $row['price'],
                $row['stock']
            );
        } else {
            return null;
        }
    }
}
