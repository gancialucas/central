<?php
class Registers {
    private $db;

    public function __construct() {
        $this->db = new DataBase;
    }

    public function insertUser($data) {
        $this->db->query('INSERT INTO users (Nombre, Telefono, Email, Clave) VALUES (:nombre, :telefono, :email, :clave)');

        // Vincular los valores
        $this->db->bind(':nombre', $data['name']);
        $this->db->bind(':telefono', $data['phone']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':clave', $data['pass']);

        // Ejecutar
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
