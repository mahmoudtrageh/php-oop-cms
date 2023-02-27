<?php

use src\Validation;
use src\validationRules\ValidateMaximum;
use src\validationRules\ValidateMinimum;
use src\Auth;

class DashboardController extends \src\Controller{
    function runBeforeAction() {
        if($_SESSION['is_admin'] ?? false == true) {
            return true;
        }
        
        $action = $_GET['action']?? $_POST['action']??'default';
        if($action != 'login') {
            header("Location:/admin/index.php?module=dashboard&action=login");
        } 
        return true;
    }

    function defaultAction() {
        $variables = [];
        header("Location:/admin/index.php?module=page");
        exist();
    }


    function loginAction() {

        if($_POST['postAction'] ?? 0 == 1) {
            $username = $_POST['username']??'';
            $password = $_POST['password']??'';

            $validation = new Validation();

            if(!$validation
                ->addRule(new ValidateMinimum(6))
                ->addRule(new ValidateMaximum(20))
                // ->addRule(new ValidateSpecialCharacter())
                // ->addRule(new ValidateNotEmptySpaces())
                ->validate($password)
                    ){
                    $_SESSION['validationRules']['errors'] = $validation->getAllErrorMessages(); 
            }

            if(!$validation
                ->addRule(new ValidateMinimum(6))
                ->addRule(new ValidateMaximum(20))
                // ->addRule(new ValidateEmail())
                ->validate($username)
                    ){
                    $_SESSION['validationRules']['errors'] = $validation->getAllErrorMessages();
            }
       
            if(($_SESSION['validationRules']['error'] ?? '') == '') {
                $auth = new Auth();
                if($auth->checkLogin($username, $password)) {
                    $_SESSION['is_admin'] = 1;
                    header("Location:/admin/");
                    exit();
                }

                $_SESSION['validationRules']['errors'] = $validation->getAllErrorMessages();

            }
            
        }

        include VIEW_PATH . 'admin/login.html';
        unset($_SESSION['validationRules']['error']);
    }
}



?>