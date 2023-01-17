<?php

require_once 'controller/controller.php';

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

if($section == 'about') {
    
    include 'controller/about-us.php';
    $aboutController = new AboutController();
    $aboutController->runAction($action);

} else if ($section == 'contact') {
    
    include 'controller/contact-us.php';
    $contactController = new ContactController();
    $contactController->runAction($action);

} else {
    include 'controller/home.php';
}
