<?php
session_start();

use src\DatabaseConnection;
use src\Template;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define('MODULE_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);
define('ENCRYPTION_SALT', '13edssdsdsdsd');


// TODO: move this to stand alone function

spl_autoload_register(function ($class_name) {

    $file = ROOT_PATH . str_replace('\\', '/', $class_name) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }

    // if(file_exists(ROOT_PATH . 'src/' . $class_name . '.php')) {
    //     include ROOT_PATH . 'src/' . $class_name . '.php';
    // } else if(file_exists(MODULE_PATH . 'page/models/'. $class_name . '.php')) {
    //     require_once MODULE_PATH . 'page/models/'. $class_name . '.php';
    // } else if (file_exists(MODULE_PATH . 'user/models/'. $class_name . '.php')) {
    //     require_once MODULE_PATH . 'user/models/'. $class_name . '.php';
    // }
});

require '../../vendor/autoload.php';

/* Connect to a MySQL database using driver invocation */
DatabaseConnection::connect('localhost', 'cms', 'root', '');

// if / else logic 

$module = $_GET['module'] ?? $_POST['module'] ?? 'dashboard';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';

$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();

if ($module=='dashboard') {
    
    include MODULE_PATH . 'dashboard/admin/controllers/DashboardController.php';
    
    $dashboardController = new DashboardController();
    $dashboardController->template = new Template('admin/layout/default');
    $dashboardController->runAction($action);
    
} elseif($module = 'page') {
    include MODULE_PATH . 'page/admin/controllers/PageController.php';
    
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('pages.log', Logger::WARNING));

    $pageController = new modules\page\admin\controllers\PageController();
    $pageController->log = $log;
    $pageController->dbc = $dbc;
    $pageController->template = new Template('admin/layout/default');
    $pageController->runAction($action);
}
