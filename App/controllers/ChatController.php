<?php

declare(strict_types=1);

class ChatController{
    public function showChat(): void{
        $view = new View("Messagerie");
        $view->render("messaging");
    }
}