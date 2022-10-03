<?php
    // Para redireccionar la pagina
    function redirect ($page){
        header('location: ' . PATH_URL . $page);
    }