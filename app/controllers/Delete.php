<?php
class Delete extends MainController
{
    public function __construct()
    {
        $this->userModel = $this->model('Erase');
    }

    /*********************************************
            FUNCIÓN PARA MOSTAR PAGINA DELETE
     **********************************************/
    public function index()
    {
        $this->views('pages/delete');
    }

    /*********************************************
            FUNCIÓN PARA BORRAR LA CLINICA
     **********************************************/
    public function deleteUser($params)
    {
        // Obtener la información de usario desde el modelo 
        $users = $this->userModel->getUser($params[0]);

        $data = [
            'id' => $users->id,
            'name' => $users->Nombre,
            'phone' => $users->Telefono,
            'email' => $users->Email,
            'pass' => $users->Clave
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        $this->views('pages/delete', $data);
    }
}
