<?php
require '../vendor/autoload.php'; // On place ce fichier dans le dossier public pour eviter de demarrer un server web au même niveau que le dossier vendor
// si non ce server aura forcement accès au dossier vendor, et ceci est dangereux pour la sécurité. Du coup le dossier public servira de racine à notre server web
define('DEBUG_TIME', microtime(true));

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router = new App\Router(dirname(__DIR__) . '/views'); // Permet de demarrer le router
$router
    ->get('/', 'post/index', 'home')
    ->get('/blog/category', 'category/show', 'category')
    ->run();
