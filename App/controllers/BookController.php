<?php

declare(strict_types=1);

class BookController{

    public function listBooks(): void{
        $search=Utils::request('search');
        $bookManager = new BookManager();
        if(isset($search)){
            $books = $bookManager->searchBooks($search);
        }else{
            $books = $bookManager->getAllBooks();
        }
        
        $view = new View("Liste des livres");
        $view->render("books", ['books' => $books]);
    }

    public function detailBook():void{
        $bookManager = new BookManager();
        $idBook=Utils::request('id', -1);
        $book = $bookManager->getBookById(intval($idBook));
        if(isset($book)){
        $userManager = new UserManager();
        $owner = $userManager->getUserById($book->getOwner_id());

        $view = new View("détail du livre: ".htmlspecialchars($book->getTitle()));
        $view->render("book-detail", ['book' => $book, 'owner' => $owner]);
        }else{
            Utils::redirect("nos-livres");
        }
    }

    public function editBook():void{
        if(Utils::isConnected()){
            $bookManager = new BookManager();
            $idBook=Utils::request('id', -1);
            $book = $bookManager->getBookById(intval($idBook));
        
            $view = new View("Modification du livre: ".htmlspecialchars($book->getTitle()));
            $view->render("book-edit", ['book' => $book]);
        }else{
            Utils::redirect("connexion");
        }

    }

    //traitement updatebook
    public function updateBook(): void {
        if(Utils::isConnected()){
            $bookManager = new BookManager();
            //récupére les données
            $idBook = Utils::request("idBook");
            $titre = Utils::request("titre");
            $author = Utils::request("author");
            $description = Utils::request("description");
            $status = Utils::request("status");
            $cover = Utils::requestFile("cover");

            var_dump($_REQUEST);
            var_dump($_FILES);

            try{
                //récupère un Book à partir de l'id passé en paramètre
                $book=$bookManager->getBookById(intval($idBook));
                if (!$book){
                    throw new Exception("Le livre est introuvable");
                }

                //verifie présence d'une image 
                if($cover["error"]<>4){
                    //vérifie la validité d'une image
                    if($cover['error']===0){
                        $extension = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
                        $newCover = uniqid() . '.' . $extension;
                        
                    }else{
                        throw new Exception("L'image uploadée est invalide.");
                    }
                }
                //vérifie les données reçues
                if (empty($titre) || empty($author)) {
                    throw new Exception("Les champs titre et auteur sont obligatoires.");
                }
                //met à jour les infos de l'instance Book
                if(!empty($titre)){
                    $book->setTitle($titre);
                }
                if(!empty($author)){
                    $book->setAuthor($author);
                }
                $book->setDescription($description);
                $book->setStatus($status);

                if(isset($newCover)){
                    $fileToRemove=$book->getCover();
                    //supprime l'ancienne photo
                    if(isset($fileToRemove)){
                        unlink(UPLOADS_PATH .'books/'. $book->getCover());
                    }
                    $book->setCover($newCover);
                    move_uploaded_file($_FILES['cover']['tmp_name'], UPLOADS_PATH .'books/'. $newCover);
                }
                $bookManager->updateBook($book);
            } catch (Exception $e) {
                
                Utils::redirect("editer-livre",['id'=>$idBook, 'errorMessage' => $e->getMessage()]);
            }

            Utils::redirect("editer-livre",['id'=>$idBook, 'message' => "modification effectuée."]);
        }else{
            Utils::redirect("connexion");
        }
    }

    public function deleteBook(): void {
        $bookManager = new BookManager();
        $idBook=Utils::request('id', -1);
        try{
            $book = $bookManager->deleteBookById(intval($idBook));
        } catch (Exception $e) {
            Utils::redirect("account",['bookErrorMessage' => $e->getMessage()]);
        }
        Utils::redirect("account",['bookMessage' =>"Suppression réussie."]);
    }
}