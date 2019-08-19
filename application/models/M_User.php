<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model
{
    protected $table = 'users';

    public function list_data(){
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array();
        }
    }

    public function tambah($data){
        return $this->db->insert($this->table,$data);
    }
}