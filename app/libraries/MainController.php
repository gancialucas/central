<?php

    class MainController {
        /* CARGAR MODELO */ 
        public function model($model) {
            require_once '../app/models/' . $model . '.php';
            return new $model();
        }

        /* CARGAR VISTA */ 
        public function views($views, $data = []) {
            if (file_exists('../app/views/' . $views . '.php')) {
                require_once '../app/views/' . $views . '.php';
            } else {
                die('¡La vista no existe!');
            }
        }
    }