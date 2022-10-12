<?php

    class Pages extends MainController {
        public function __construct(){
            $this->userModel = $this->model('Openings');
        }

        /*********************************************
            FUNCIÓN PARA MOSTAR PAGINA OPENING
        **********************************************/
        public function index(){         
            $this -> views('pages/opening');
        }
    }