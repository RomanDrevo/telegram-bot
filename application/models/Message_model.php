<?php

class Message_model extends CI_Model {



    public $text;
    public $address;
    public $date;

    public function get_last_ten_entries()
    {
        $query = $this->db->select('*')->from('messages')->order_by('id', 'desc')->get();

        return $query->result();
    }

    public function insert_entry($data)
    {
        $this->db->insert('messages', $data);
    }

    public function update_entry()
    {
        $this->text    = $_POST['text'];
        $this->address  = $_POST['address'];
        $this->date     = time();

        $this->db->update('message', $this, array('id' => $_POST['id']));
    }



}