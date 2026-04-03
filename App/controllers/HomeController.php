<?php

declare(strict_types=1);

final class HomeController 
{
    private BookManager $bookManager;

    public function __construct(){
        $this->bookManager = new BookManager();
    }

    public function home(): void
    {
        $books = $this->bookManager->getNBooks(4);

        $view = new View("Accueil","home");
        $view->render("home", ['books' => $books]);
    }
}
