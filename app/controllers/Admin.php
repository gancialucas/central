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

    /*********************************************
        FUNCIÓN PARA EDITAR AL USARIO
    **********************************************/
    public function edit($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'pass' => trim($_POST['pass'])
            ];

            if (!$this->userModel->editUser($data)) {
                die('¡UPS! Algo salió mal :(');
                return;
            } else {            
                // Obtener información de usario desde el modelo
                $users = $this->userModel->getUser($id);
                
                $data = [
                    'id' => $users->id,
                    'name' => $users->Nombre,
                    'phone' => $users->Telefono,
                    'email' => $users->Email,
                    'pass' => $users->Clave
                ];
    
                $this->views('pages/edit', $data);
            }
        } 

        redirect('/pages/login');
    }
}
