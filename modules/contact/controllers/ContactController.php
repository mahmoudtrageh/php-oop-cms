<?php

use src\DatabaseConnection;
use modules\page\models\Page;

class ContactController extends \src\Controller{


  function runBeforeAction() {
    if($_SESSION['has_submitted_the_form'] ?? 0 == 1) {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $pageObj = new Page($dbc);
        $pageObj->findById(4);
        $variables['pageObj'] = $pageObj;

      $this->template->view('contact/views/static-page', $variables);

      return false;

    }

    return true;

  }
  function defaultAction() {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $pageObj = new Page($dbc);
        $pageObj->findBy('id', $this->entityId);
        $variables['pageObj'] = $pageObj;

        $this->template->view('contact/views/contact-us', $variables);
  }

  function submitContactFormAction() {

      $_SESSION['has_submitted_the_form'] = 1;

      $dbh = DatabaseConnection::getInstance();
      $dbc = $dbh->getConnection();

      $pageObj = new Page($dbc);
      $pageObj->findById(5);
      $variables['pageObj'] = $pageObj;

        $this->template->view('contact/views/static-page', $variables);
   
  }

}


?>
