<?php


require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/autoload.php';

// ROUTEUR
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');
switch ($uri) {
    case '':
        $homeController = new HomeController();
        $homeController->home();
        break;
	case 'nos-livres':
		$bookController = new BookController();
		$bookController->listBooks();
		break;
	case 'detail-livre':
		$bookController = new BookController();
		$bookController->detailBook();
		break;
	case 'connexion':
		$userController = new UserController();
		$userController->connexionUser();
		break;
	case 'connect':
		$userController = new UserController();
		$userController->connectUser();
		break;
	case 'disconnect':
		$userController = new UserController();
		$userController->disconnectUser();
		break;
	case 'inscription':
		$userController = new UserController();
		$userController->registerUser();
		break;
	case 'addUser':
		$userController = new UserController();
		$userController->addUser();
		break;
	case 'profil':
		$userController = new UserController();
		$userController->profileUser();
		break;
	case 'account':
		$userController = new UserController();
		$userController->accountUser();
		break;
	default:
		// Page d'accueil ou 404
		echo 'Page non trouvée';
		break;
}
