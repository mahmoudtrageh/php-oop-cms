<?php

class ContactController extends Controller{


  function runBeforeAction() {
    if($_SESSION['has_submitted_the_form'] ?? 0 == 1) {
      include 'view/contact/already-contacted.html';
      return false;

    }

    return true;

  }
  function defaultAction() {

    include 'view/main/layout.html';

    include 'view/main/header.html';
    
    include 'view/contact/contact-us.html';
    
    include 'view/main/footer.html';
  }

  function submitContactFormAction() {

      $_SESSION['has_submitted_the_form'] = 1;

      include 'view/contact/thank-you-submit.html';
   
  }

}


?>
