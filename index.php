<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/controller.php';
require_once ROOT_PATH . 'src/template.php';

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

if($section == 'about') {
    
    include ROOT_PATH . 'controller/about-us.php';
    $aboutController = new AboutController();
    $aboutController->runAction($action);

} else if ($section == 'contact') {
    
    include ROOT_PATH . 'controller/contact-us.php';
    $contactController = new ContactController();
    $contactController->runAction($action);

} else {
    include ROOT_PATH . 'controller/home.php';
    $homeontroller = new HomeController();
    $homeontroller->runAction($action);
}
