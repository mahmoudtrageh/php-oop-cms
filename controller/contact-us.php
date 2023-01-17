<?php

class ContactController extends Controller{

  function defaultAction() {
    include 'view/main/layout.html';

    include 'view/main/header.html';
    
    include 'view/contact-us.html';
    
    include 'view/main/footer.html';
  }

  function submitContactFormAction() {
    include 'view/thank-you-submit.html';
  }

}


?>
