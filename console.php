<?php

require_once __DIR__ . '/src/Services/LibraryService.php';

$library = new LibraryService();

$continuer = true;

echo "=== GESTIONNAIRE DE BIBLIOTHEQUE (OOP) ===\n";

while ($continuer) {
    echo "\n--- MENU ---\n";
    echo "1. Afficher tous les livres\n";
    echo "2. Ajouter un nouveau livre\n";
    echo "3. Rechercher un livre par titre\n";
    echo "4. Quitter\n";
    echo "Choisissez une option (1-4) : ";

    $choix = trim(fgets(STDIN));

    if ($choix === '1') {
        echo "\n-- Liste des livres --\n";
        $library->displayBooks();
    } 
    elseif ($choix === '2') {
        echo "\n-- Ajouter un livre --\n";
        echo "Titre : ";
        $titre = trim(fgets(STDIN));
        
        echo "Auteur : ";
        $auteur = trim(fgets(STDIN));
        
        echo "Prix : ";
        $prixInput = trim(fgets(STDIN));
        $prix = is_numeric($prixInput) ? (float)$prixInput : 0;
        
        echo "Stock : ";
        $stockInput = trim(fgets(STDIN));
        $stock = is_numeric($stockInput) ? (int)$stockInput : 0;

        try {
            $library->addBook($titre, $auteur, $prix, $stock);
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }
    } 
    elseif ($choix === '3') {
        echo "\n-- Rechercher un livre --\n";
        echo "Entrez le titre à rechercher : ";
        $titre = trim(fgets(STDIN));
        $library->searchBook($titre);
    } 
    elseif ($choix === '4') {
        echo "Au revoir !\n";
        $continuer = false;
    } 
    else {
        echo "Option invalide, veuillez recommencer.\n";
    }
}
