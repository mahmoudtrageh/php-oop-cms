<?php

class HomeController extends Controller{

    function defaultAction() {
       
        $variables['title'] = 'Home Page Title';
        $variables['content'] = 'This is home page content and hello my friend';

        $template = new Template('default');
        $template->view('static-page', $variables);
    }

}



?>