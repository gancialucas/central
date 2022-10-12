<?php
class Edits {
    private $db;

    public function __construct() {
        $this->db = new DataBase;
    }

    public function getUser($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $results = $this->db->register();
        return $results;
    }

    public function editUserById($id, $name, $phone, $email, $pass){
        $this->db->query("UPDATE users SET Nombre=:name, Telefono=:phone, Email=:email, Clave=:pass WHERE id = :id");

        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':phone', $phone);       
        $this->db->bind(':email', $email);
        $this->db->bind(':pass', $pass); 
        
        if ($this->db->execute())
            return true;
        return false;
    }
}