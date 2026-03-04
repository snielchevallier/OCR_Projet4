<?php

declare(strict_types=1);

class BookController{

    public function listBooks(): void{
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();
        
        $view = new View("Liste des livres");
        $view->render("books", ['books' => $books]);
    }

    public function detailBook():void{
        $bookManager = new BookManager();
        $idBook=Utils::request('id', -1);
        $book = $bookManager->getBookById(intval($idBook));

        $view = new View("détail du livre");
        $view->render("book-detail", ['book' => $book]);
    }
}