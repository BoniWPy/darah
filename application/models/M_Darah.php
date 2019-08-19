<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Darah extends CI_Model
{
    protected $table = 'darah';

    public function list_data(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_By("golongan","ASC");
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

    public function detail($id){
        return $this->db->get_where($this->table,["id_darah"=>$id])->result();
    }

    public function update_stok($id,$stok){
        $this->db->set("stok",$stok);
        $this->db->where("id_darah",$id);

        return $this->db->update($this->table);
    }
}