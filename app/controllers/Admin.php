<?php
class Admin extends MainController{
    public function __construct(){
        $this->userModel = $this->model('Admins');
    }

    /*********************************************
            FUNCIÓN PARA MOSTAR PAGINA ADMIN
     **********************************************/
    public function index(){
        // Obtener lo usuarios 
        $users = $this->userModel->getUser();

        $data = [
            'users' => $users
        ];

        $this->views('pages/admin', $data);
    }
}
