<?php
    class Admin extends MainController {
        public function __construct(){
            $this->userModel = $this->model('Admins');
        }

        /*********************************************
            FUNCIÓN PARA MOSTAR PAGINA ADMIN
        **********************************************/
        public function index(){
            $this->views('pages/admin');
        }

        
    }