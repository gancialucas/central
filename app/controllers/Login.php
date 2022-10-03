<?php
    class Login extends MainController {
        public function __construct(){
            $this->userModel = $this->model('Logins');
        }

        /*********************************************
            FUNCIÓN PARA MOSTAR PAGINA LOGIN
        **********************************************/
        public function index(){
            $this->views('pages/login');
        }
    }