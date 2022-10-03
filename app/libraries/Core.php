<?php
/*
    Traer o mapear la URL ingresada en el navegador
        1. Controlador
        2. Método
        3. Parámetro - id

        Ejemplo: articulo/acutalizar/4        
*/

class Core
{
    protected $activeController = 'Pages';
    protected $activeMethod = 'index';
    protected $parameters = [];

    // Constructor
    public function __construct()
    {

        $url = $this->getUrl();

        //CAMBIO EL CONTROLADOR
        if (isset($url[0])) {
            /* Buscar en controllers si el controlador existe */
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                /* Si existe se setea como controlador por defecto */
                $this->activeController = ucwords($url[0]);

                /* unset indice */
                unset($url[0]);
            }
        }

        /* Requerir el controlador */
        require_once '../app/controllers/' . $this->activeController . '.php';
        $this->activeController = new $this->activeController;

        // CAMBIO EL METODO
        if (isset($url[1])) {
            if (method_exists($this->activeController, $url[1])) {
                $this->activeMethod = $url[1];
                unset($url[1]);
            }
        }

        // CAMBIO EL PARAMETRO
        $this->parameters = $url ? array_values($url) : [];
        call_user_func([$this->activeController, $this->activeMethod], $this->parameters);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
