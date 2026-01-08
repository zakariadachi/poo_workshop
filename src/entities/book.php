<?php

class Book {
    private int $id;
    private string $title;
    private Author $authorName;
    private float $price;
    private int $stock;

    public function __construct($id, $title, $authorName, $price, $stock) {
        $this->id = $id;
        $this->title = $title;
        $this->authorName = $authorName;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthorName() {
        return $this->authorName;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }
}