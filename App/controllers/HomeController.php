<?php

declare(strict_types=1);

final class HomeController 
{
    public function home(): void
    {
        $view = new View("Accueil");
        $view->render("home");
    }
}
