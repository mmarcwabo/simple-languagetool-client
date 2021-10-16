<?php
namespace app\libs;

class View{
    public $page;
    public function render($error_message = ""){

        include_once APP_ROOT.'views/header/header.php';
        //The page body here
        if(file_exists($this->page)){
            include_once APP_ROOT.$this->page;
        }else{
            //$this->render("Error 404 : Page Not Found.");
        }
        //End of the page body
        include_once APP_ROOT.'views/footer/footer.php';

    }
}