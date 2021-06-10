<?php


class ExceptionController{
    public function pageNotFound(){
        $message = null;
        if ($_GET['message']) {
            if ($_GET['message'] == 'vehicle-not-found')
                $message = 'Vehicle Not Found. Sorry!';


        }
        http_response_code(404);
        require 'View/404.php';
    }
}