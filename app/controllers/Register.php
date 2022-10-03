<?php
    class Register extends MainController {
        public function __construct(){
            $this->userModel = $this->model('Registers');
        }

        /*********************************************
            FUNCIÓN PARA MOSTAR PAGINA REGISTRO
        **********************************************/
        public function index(){
            $this->views('pages/register');
        }

        /*********************************************
            FUNCIÓN PARA INSERTAR UN NUEVO USARIO
        **********************************************/
        public function insert(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'name' => trim($_POST['name']),
                    'phone' => trim($_POST['phone']),
                    'email' => trim($_POST['email']),
                    'pass' => trim($_POST['pass'])
                ];

                if (!$this->userModel->insertUser($data)) {

                    die('¡UPS! Algo salió mal :(');
                    return;
                }
            }

            redirect('/pages/login');
        }
    }