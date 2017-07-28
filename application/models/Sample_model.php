<?php


class Sample_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function CRUD_create (){
        $query = 'CREATE TABLE messages (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    text VARCHAR (30) NOT NULL,
                    adress VARCHAR (30) NOT NULL,
                    updatedAt TIMESTAMP NOT NULL
        )';

        return $this->db->query($query);
    }

}