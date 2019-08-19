<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model
{
    protected $table = 'users';

    public function login($data){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($data);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array()[0];
        }
    }
}