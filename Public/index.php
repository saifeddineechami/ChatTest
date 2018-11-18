<?php
/**
 * Created by PhpStorm.
 * User: saif
 * Date: 06/11/18
 * Time: 21:21
 */
use Core\Dispatcher;
use Symfony\Component\Yaml\Yaml;

// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs
ini_set('error_log', dirname(__file__) . '/../Var/log_error_php.txt');
// Afficher les erreurs et les avertissements
error_reporting(E_ALL);


if (!isset($_SESSION)) {
    session_start();
}

require_once "../vendor/autoload.php";

//Load Parameters
$parameters = Yaml::parseFile(dirname(__file__) .'/../App/Config/parameters.yml');
foreach ($parameters["parameters"] as $key => $value) {
    define("__".$key."__", $value);
}


//Execute request
Dispatcher::getInstance()->dispatch();
