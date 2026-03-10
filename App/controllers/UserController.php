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
    
    //connectUser

    //disconnectUser

    //registerUser

    //profileUser
}