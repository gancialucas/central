<?php
class Edit extends MainController
{
    public function __construct()
    {
        $this->userModel = $this->model('Edits');
    }

    /*********************************************
            FUNCIÓN PARA MOSTAR PAGINA EDIT
     **********************************************/
    public function index()
    {
        $this->views('pages/edit');
    }

    /*********************************************
        FUNCIÓN PARA EDITAR AL USARIO
     **********************************************/
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'pass' => trim($_POST['pass'])
            ];

            $this->views('pages/edit', $data);

            if ($this->userModel->editUser($data)) {
                redirect('/pages/admin');
            } else {
                die('¡UPS! Algo salió mal :(');
                return;
            }
        } else {
            // Obtener lo usuarios 
            $users = $this->userModel->getUser();

            $data = [
                'users' => $users
            ];

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
}
