<?php

class AboutController extends Controller{

    function defaultAction() {
        include 'view/main/layout.html';

        include 'view/main/header.html';
        
        include 'view/about-us.html';
        
        include 'view/main/footer.html';
    }

}



?>