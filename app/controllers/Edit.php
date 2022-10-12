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
    public function editUser($params)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'id' => $params[0],
                'name' => trim($_POST['name']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'pass' => trim($_POST['pass'])
            ];

            if ($this->userModel->editUserById($params[0], trim($_POST['name']), trim($_POST['phone']), trim($_POST['email']), trim($_POST['pass']))) {
                redirect('/admin');
            } else {
                die('¡UPS! Algo salió mal :(');
                return;
            }
        } else {
            // Obtener la información de usario desde el modelo 
            $users = $this->userModel->getUser($params[0]);

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

    /*********************************************
            FUNCIÓN PARA BORRAR LA CLINICA
     **********************************************/
    public function deleteUser($params)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener la información de usario desde el modelo 
            $users = $this->userModel->getUser($params[0]);

            $data = [
                'id' => $users->id,
                'name' => $users->Nombre,
                'phone' => $users->Telefono,
                'email' => $users->Email,
                'pass' => $users->Clave
            ];


            $data = [
                'id' => $params[0]
            ];

            if ($this->userModel->deleteUserById($params[0])) {
                redirect('/admin');
            } else {
                die('¡UPS! Algo salió mal :(');
                return;
            }
        }
        
        $this->views('pages/edit', $data);
    }
}
