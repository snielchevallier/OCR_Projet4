<?php

declare(strict_types=1);

final class HomeController 
{
    public function home(): void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getNBooks(4);

        $view = new View("Accueil","home");
        $view->render("home", ['books' => $books]);
    }
}
