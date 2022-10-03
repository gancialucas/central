<?php

    class Pages extends MainController {
        public function __construct(){
            $this->userModel = $this->model('Openings');
        }

        /*********************************************
            FUNCIÓN PARA MOSTAR PAGINA OPENING
        **********************************************/
        public function index(){
            // Obtener los usuarios
            // $users = $this->userModel->getUsers();
            // $data = [
            //     'users' => $users
            // ];            
            $this -> views('pages/opening');
        }
    }