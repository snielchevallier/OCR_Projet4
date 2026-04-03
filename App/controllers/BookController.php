<?php

declare(strict_types=1);

class BookController{
    private BookManager $bookManager;
    private UserManager $userManager;

    public function __construct(){
        $this->bookManager = new BookManager();
        $this->userManager = new UserManager(); 
    }

    public function listBooks(): void{
        $search=Utils::request('search');
       if(isset($search)){
            $books = $this->bookManager->searchBooks($search);
        }else{
            $books = $this->bookManager->getAllBooks();
        }
        
        $view = new View("Liste des livres","livres");
        $view->render("books", ['books' => $books]);
    }

    public function detailBook():void{
        $idBook=Utils::request('id', -1);
        $book = $this->bookManager->getBookById(intval($idBook));
        if(isset($book)){
        $owner = $this->userManager->getUserById($book->getOwner_id());

        $view = new View("détail du livre: ".htmlspecialchars($book->getTitle()),"livres");
        $view->render("book-detail", ['book' => $book, 'owner' => $owner]);
        }else{
            Utils::redirect("nos-livres");
        }
    }

    public function editBook():void{
        if(Utils::isConnected()){
            $idBook=Utils::request('id', -1);
            $id_user=$_SESSION['idUser'];
            $book = $this->bookManager->getBookByIdAndOwner(intval($idBook), intval($id_user));
            try{
                if (!$book){
                    throw new Exception("Le livre est introuvable");
                }
            } catch (Exception $e) {
                Utils::redirect("/account",['errorMessage' => $e->getMessage()]);
            }
            $view = new View("Modification du livre: ".htmlspecialchars($book->getTitle()),"account");
            $view->render("book-edit", ['book' => $book]);
        }else{
            Utils::redirect("connexion");
        }

    }

    //traitement updatebook
    public function updateBook(): void {
        if(Utils::isConnected()){
            //récupére les données
            $idBook = Utils::request("idBook");
            $titre = Utils::request("titre");
            $author = Utils::request("author");
            $description = Utils::request("description");
            $status = Utils::request("status");
            $cover = Utils::requestFile("cover");
            $id_user=$_SESSION['idUser'];
            try{
                //récupère un Book à partir de l'id passé en paramètre
                $book=$this->bookManager->getBookByIdAndOwner(intval($idBook), intval($id_user));
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
                $this->bookManager->updateBook($book);
            } catch (Exception $e) {
                
                Utils::redirect("/account/editer-livre",['id'=>$idBook, 'errorMessage' => $e->getMessage()]);
            }

            Utils::redirect("/account/editer-livre",['id'=>$idBook, 'message' => "modification effectuée."]);
        }else{
            Utils::redirect("connexion");
        }
    }

    public function deleteBook(): void {
       $idBook=Utils::request('id', -1);
        try{
            $id_user=$_SESSION['idUser'];
            $book = $this->bookManager->deleteBookByIdAndOwner(intval($idBook), intval($id_user));
        } catch (Exception $e) {
            Utils::redirect("account",['bookErrorMessage' => $e->getMessage()]);
        }
        Utils::redirect("account",['bookMessage' =>"Suppression réussie."]);
    }
}