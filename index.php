<?php
    namespace frameData;
    use frameData\controller\HomeController;
    use frameData\controller\CharacterController;
    include './controller/HomeController.php';
    include './controller/CharacterController.php';

    $homeController = new HomeController();
    $characterController = new CharacterController();


    //utilisation de session_start(pour gérer la connexion au serveur)
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //routeur
    switch ($path) {
        case '/frameData/':
            $homeController->getHome();
            break;
        case '/frameData/addCharacter':
            $characterController->addCharacter();
            break;
        default:
            $homeController->get404();
        break;
    }
?>
