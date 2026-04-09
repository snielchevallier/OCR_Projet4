<?php

declare(strict_types=1);
/**
 * Contrôleur qui gère les différentes actions liées aux utilisateurs.
 * Il utilise le UserManager pour interagir avec la base de données et récupérer les informations sur les utilisateurs.
 * Les méthodes de ce contrôleur sont utilisées pour afficher le formulaire d'inscription, le formulaire de connexion, traiter l'inscription, traiter la connexion, traiter la déconnexion, afficher le profil d'un utilisateur, afficher la page de compte d'un utilisateur et traiter la modification d'un utilisateur.
 */
class UserController
{
    private UserManager $userManager;
    private BookManager $bookManager;
    /** Constructeur de la classe UserController.
     * Il initialise les managers nécessaires pour les différentes méthodes de ce controlleur.
     */
    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->bookManager = new BookManager();
    }
    /** Affiche le formulaire d'inscription.
     * @return void
     */
    public function registerUser(): void
    {

        $view = new View("Inscription", "connexion");
        $view->render("register");
    }
    /** Affiche le formulaire de connexion.
     * @return void
     */
    public function connexionUser(): void
    {

        $view = new View("Connexion", "connexion");
        $view->render("connexion");
    }

    /** Traite la connexion d'un utilisateur.
     * @return void
     */
    public function connectUser(): void
    {
        $login = Utils::request("email");
        $password = Utils::request("password");
        try {
            if (empty($login) || empty($password)) {
                throw new Exception("erreur");
            }

            $user = $this->userManager->getUserByEmail($login);

            if (!$user) {
                throw new Exception("erreur");
            }
            if (!password_verify($password, $user->getPassword())) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                throw new Exception("erreur");
            }
            $_SESSION['user'] = $user;
            $_SESSION['idUser'] = $user->getId();
        } catch (Exception $e) {
            Utils::redirect("connexion", ['errorMessage' => $e->getMessage()]);
        }

        Utils::redirect("/account");
    }

    /** Traite la déconnexion d'un utilisateur.
     * @return void
     */
    public function disconnectUser(): void
    {
        unset($_SESSION['user']);
        unset($_SESSION['idUser']);
        Utils::redirect("/");
    }

    /** Traite l'inscription d'un utilisateur.
     * @return void
     */
    public function addUser(): void
    {
        //récupére les données
        $pseudo = Utils::request("pseudo");
        $email = Utils::request("email");
        $password = Utils::request("password");

        try {
            //vérifie les données reçues
            if (empty($pseudo) || empty($email) || empty($password)) {
                throw new Exception("Tous les champs sont obligatoires.");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Email invalide.");
            }

            //vérifie que le mail du user n'existe pas
            if ($this->userManager->getUserByEmail($email)) {
                throw new Exception("Cet email est déjà utilisé.");
            }

            //vérifie que le pseudo du user n'existe pas
            if ($this->userManager->getUserByPseudo($pseudo)) {
                throw new Exception("Ce pseudo est déjà utilisé.");
            }

            //crée un objet User
            $user = new User([
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            $usercreated = $this->userManager->addUser($user);

            //connecte le User
            $_SESSION['user'] = $usercreated;
            $_SESSION['idUser'] = $usercreated->getId();
        } catch (Exception $e) {
            echo $e->getMessage();
            Utils::redirect("inscription", ['errorMessage' => $e->getMessage()]);
        }
        //renvoie vers la page account
        Utils::redirect("account");
    }

    /** Affiche le profil d'un utilisateur.
     * @return void
     */
    public function profileUser(): void
    {
        $idUser = Utils::request('id', -1);
        $user = $this->userManager->getUserById(intval($idUser));
        if (isset($user)) {
            $books = $this->bookManager->getBooksByOwner(intval($idUser));
            $view = new View("profile", "livres");
            $view->render("user-profile", ['user' => $user, 'books' => $books]);
        } else {
            Utils::redirect("/");
        }
    }

    /** Affiche la page de compte d'un utilisateur. Si l'utilisateur n'est pas connecté, redirige vers la page de connexion.
     * @return void
     */
    public function accountUser(): void
    {
        $idUser = $_SESSION['idUser'];
        $user = $this->userManager->getUserById(intval($idUser));

        $books = $this->bookManager->getBooksByOwner(intval($idUser));
        if (isset($user)) {
            $view = new View("account", "account");
            $view->render("user-account", ['user' => $user, 'books' => $books]);
        } else {
            Utils::redirect("/");
        }
    }

    /** Traite la modification d'un utilisateur.
     * @return void
     */
    public function updateUser(): void
    {

        //récupére les données
        $pseudo = Utils::request("pseudo");
        $email = Utils::request("email");
        $password = Utils::request("password");
        $photo = Utils::requestFile("photo");

        try {
            //récupère un User à partir de l'id user de la session
            $user = $this->userManager->getUserById($_SESSION['idUser']);
            if (!$user) {
                throw new Exception("L'utilisateur est introuvable");
            }

            //verifie présence d'une image 
            if ($photo["error"] <> 4) {
                //vérifie la validité d'une image
                if ($photo['error'] === 0) {
                    $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                    $newPhoto = uniqid() . '.' . $extension;
                } else {
                    throw new Exception("L'image uploadée est invalide.");
                }
            }


            //vérifie les données reçues
            if (empty($pseudo) || empty($email)) {
                throw new Exception("Tous les champs sont obligatoires.");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Email invalide.");
            }

            //met à jour les infos de l'instance User

            //si l'email reçu est différent de l'existant, vérifie que le nouvel email du user n'existe pas
            if ($email != $user->getEmail()) {
                if ($this->userManager->getUserByEmail($email)) {
                    throw new Exception("Cet email est déjà utilisé.");
                } else {
                    $user->setEmail($email);
                }
            }

            //si le pseudo reçu est différent de l'existant, vérifie que le nouvel pseudo du user n'existe pas
            if ($pseudo != $user->getPseudo()) {
                if ($this->userManager->getUserByPseudo($pseudo)) {
                    throw new Exception("Ce pseudo est déjà utilisé.");
                } else {
                    $user->setPseudo($pseudo);
                }
            }

            if (!empty($password)) {
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
            }

            if (isset($newPhoto)) {
                $fileToRemove = $user->getPhoto();
                //supprime l'ancienne photo
                if (isset($fileToRemove)) {
                    unlink(UPLOADS_PATH . 'users/' . $user->getPhoto());
                }
                $user->setPhoto($newPhoto);
                move_uploaded_file($_FILES['photo']['tmp_name'], UPLOADS_PATH . 'users/' . $newPhoto);
            }
            $this->userManager->updateUser($user);
        } catch (Exception $e) {

            Utils::redirect("account", ['errorMessage' => $e->getMessage()]);
        }

        Utils::redirect("account", ['message' => "modification effectuée."]);
    }
}
