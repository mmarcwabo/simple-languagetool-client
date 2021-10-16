<?php

class View{
    public $page;
    public function render($error_message = ""){

        include_once URL.'views/header/header.php';
        //The page body here
        if($this->page){
            include_once URL.'/'.$this->page;
        }else{
            $this->render("Error 404 : Page Not Found.");
        }
        //End of the page body
        include_once URL.'views/footer/footer.php';

    }
}