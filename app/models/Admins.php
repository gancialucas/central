<?php
class Admins {
    private $db;

    public function __construct() {
        $this->db = new DataBase;
    }

    public function getUser(){
        $this->db->query('SELECT * FROM users ');
        $results = $this->db->registers();
        
        return $results;
    }
}