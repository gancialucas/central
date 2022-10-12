<?php
class Erase {
    private $db;

    public function __construct() {
        $this->db = new DataBase;
    }

    public function getUser($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);

        $results = $this->db->register();
        return $results;
    }

    public function deleteUserById($id) {
        $this->db->query("DELETE FROM users WHERE id = :id");

        $this->db->bind(':id', $id);
        
        if ($this->db->execute())
            return true;
        return false;
    }
}