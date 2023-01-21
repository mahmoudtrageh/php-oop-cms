<?php

class AboutController extends Controller{

    function defaultAction() {

        $variables['title'] = 'About Page Title';
        $variables['content'] = 'This is About page content and hello my friend';

        $template = new Template('default');
        $template->view('static-page', $variables);
    }

}



?>