<?php

declare(strict_types=1);

class ChatController{
    public function showChat(): void{
        $dest=Utils::request("dest");
        $curr_user=$_SESSION['idUser'];
        
        if(isset($dest)){
            //si il y a un destinataire, affiche la vue chat avec la partie message
            $userManager = new UserManager();
            $user_dest = $userManager->getUserById(intval($dest));
            
            $view = new View("Messagerie");
            $view->render("chat",['user_dest' => $user_dest]);
        }else{
            //si pas de destinataire, affiche la liste des chat sans messages
            $view = new View("Messagerie");
            $view->render("messaging");
        }
        //Charge tous les chats de l'utilisateur connecté
        //rajouter dans l'objet Chat une propriété avec un tableau de tous les messages?
        
        //si le chat n'existe pas, créer une instance chat qui sera à sauvegarder en plus du message posté
        
        
    }
}