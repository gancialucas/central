<?php
    // Cargamos nuestras librerias
    require_once 'config/configurations.php';

    require_once 'helpers/url_helper.php';

    // require_once 'libraries/Core.php';
    // require_once 'libraries/DataBase.php';
    // require_once 'libraries/MainController.php';


    // Autoload php
    spl_autoload_register (function ($className) {
        require_once 'libraries/' . $className . '.php';
    });