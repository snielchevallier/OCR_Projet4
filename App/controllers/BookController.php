<?php

declare(strict_types=1);

class BookController{

    public function listBooks(): void{
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();
        
        $view = new View("Liste des livres");
        $view->render("allBooks", ['books' => $books]);
    }
}