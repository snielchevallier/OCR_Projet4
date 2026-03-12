<?php

declare(strict_types=1);

class UserController{

    public function registerUser(): void{
        
        $view = new View("Inscription");
        $view->render("register");
    }

    public function connexionUser(): void{
        
        $view = new View("Connexion");
        $view->render("connexion");
    }
    
    //traitement connectUser
    public function connectUser(): void{
        $login = Utils::request("email");
        $password = Utils::request("password");
        try{
            if (empty($login) || empty($password)) {
                throw new Exception("erreur");
            }
            $userManager = new UserManager();
            $user = $userManager->getUserByEmail($login);
            
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
            Utils::redirect("connexion",['errorMessage' => $e->getMessage()]);
        }
      
       Utils::redirect("/account");

    }

    //traitement disconnectUser
    public function disconnectUser(): void{
        unset($_SESSION['user']);
        unset($_SESSION['idUser']);
        Utils::redirect("/");
    }

    //traitement registerUser
    public function addUser(): void{
        $userManager = new UserManager();
        $user = $userManager->addUser();
    }
    
    //page profileUser
    public function profileUser(): void{
        $userManager = new UserManager();
        $idUser=Utils::request('id', -1);
        $user = $userManager->getUserById(intval($idUser));
        if(isset($user)){
            $view = new View("profile");
            $view->render("user-profile", ['user' => $user]);
        }else{
            Utils::redirect("/");
        }
    }
    
    //page account User
    public function accountUser(): void{
        $userManager = new UserManager();
        $idUser=$_SESSION['idUser'];
        $user = $userManager->getUserById(intval($idUser));
        if(isset($user)){
            $view = new View("account");
            $view->render("user-account", ['user' => $user]);
        }else{
            Utils::redirect("/");
        }
    }

    //traitement updateuser

}