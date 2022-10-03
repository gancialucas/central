<?php
    class Openings {
        private $db;

        public function __construct(){
            $this->db = new DataBase;
        }

        public function getUsers(){
            $this->db->query('SELECT * FROM users');
            $results = $this->db->registers();
            return $results;
        }
    }
