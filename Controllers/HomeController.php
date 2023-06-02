<?php
Class HomeController {
    public function index($page){
        // the include  generates a warning, 
        // but the script will continue execution.
        // The require() generates a fatal error, 
        // and the script will stop.
        include('Views/'.$page.'.php');
    }
}
?>