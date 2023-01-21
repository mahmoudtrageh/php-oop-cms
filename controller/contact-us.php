<?php

class ContactController extends Controller{


  function runBeforeAction() {
    if($_SESSION['has_submitted_the_form'] ?? 0 == 1) {

      $variables['title'] = 'Already Contacted';
      $variables['content'] = 'You have already contacted us with this page';

      $template = new Template('default');
      $template->view('static-page', $variables);

      return false;

    }

    return true;

  }
  function defaultAction() {

        $variables['title'] = 'Contact Page Title';
        $variables['content'] = 'This is Contact page content and hello my friend';

        $template = new Template('default');
        $template->view('contact/contact-us', $variables);
  }

  function submitContactFormAction() {

      $_SESSION['has_submitted_the_form'] = 1;

        $variables['title'] = 'Thank Page';
        $variables['content'] = 'Thank you for submit';

        $template = new Template('default');
        $template->view('static-page', $variables);
   
  }

}


?>
