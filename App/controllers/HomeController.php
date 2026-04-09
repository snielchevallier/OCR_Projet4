<?php

declare(strict_types=1);
/**
 * Contrôleur qui gère les différentes actions liées à la page d'accueil.
 * Il utilise le BookManager pour interagir avec la base de données et récupérer les livres à afficher sur la page d'accueil.
 * La méthode de ce contrôleur est utilisée pour afficher la page d'accueil avec les livres les plus récents.
 */
final class HomeController
{
    private BookManager $bookManager;
    /** Constructeur de la classe HomeController.
     * Il initialise les managers nécessaires pour les différentes méthodes de ce controlleur.
     */
    public function __construct()
    {
        $this->bookManager = new BookManager();
    }
    /** Affiche la page d'accueil avec les livres les plus récents.
     * @return void
     */
    public function home(): void
    {
        $books = $this->bookManager->getNBooks(4);

        $view = new View("Accueil", "home");
        $view->render("home", ['books' => $books]);
    }
}
