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
	default:
		// Page d'accueil ou 404
		echo 'Page non trouvée';
		break;
}
