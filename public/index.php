<?php


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/autoload.php';

/*
 * Ce fichier est le point d'entrée de l'application. 
 * Il utilise un système de routage simple pour déterminer quelle action doit être exécutée en fonction de l'URL demandée.
 * En fonction de l'URL, il instancie le contrôleur approprié et appelle la méthode correspondante pour traiter la requête.
 * Si l'URL ne correspond à aucune route définie, il affiche une page d'erreur.
 */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($uri) {
	case '/':
		$homeController = new HomeController();
		$homeController->home();
		break;
	case '/livres/nos-livres-a-l-echange':
		$rubrique = "livres";
		$bookController = new BookController();
		$bookController->listBooks();
		break;
	case '/livres/detail-livre':
		$bookController = new BookController();
		$bookController->detailBook();
		break;
	case '/connexion':
		$userController = new UserController();
		$userController->connexionUser();
		break;
	case '/connect':
		$userController = new UserController();
		$userController->connectUser();
		break;
	case '/disconnect':
		$userController = new UserController();
		$userController->disconnectUser();
		break;
	case '/inscription':
		$userController = new UserController();
		$userController->registerUser();
		break;
	case '/addUser':
		$userController = new UserController();
		$userController->addUser();
		break;
	case '/updateUser':
		$userController = new UserController();
		$userController->updateUser();
		break;
	case '/profil':
		$userController = new UserController();
		$userController->profileUser();
		break;
	case '/account':
		$userController = new UserController();
		$userController->accountUser();
		break;
	case '/account/editer-livre':
		$bookController = new BookController();
		$bookController->editBook();
		break;
	case '/update-book':
		$bookController = new BookController();
		$bookController->updateBook();
		break;
	case '/supprimer-livre':
		$bookController = new BookController();
		$bookController->deleteBook();
		break;
	case '/messagerie':
		$chatController = new ChatController();
		$chatController->showChat();
		break;
	case '/sendMessage':
		$chatController = new ChatController();
		$chatController->sendMessage();
		break;
	default:
		$view = new View("Erreur", "erreur");
		$view->render("erreur",);
		break;
}
