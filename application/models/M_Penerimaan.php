<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Penerimaan extends CI_Model
{
    protected $table = 'penerimaan';
    
    public function list_data(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_By("created_at","DESC");
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array();
        }
    }

    public function getData($id_penerimaan) {
        return $this->db->from($this->table)->select('*')->where('id_penerimaan', $id_penerimaan)->get()->result();
    }

    public function tambah($insert){
        return $this->db->insert($this->table,$insert);
    }

    public function detail($id){
        return $this->db->get_where($this->table,["id_darah"=>$id])->result();
    }

    public function update_stok($id,$stok){
        $this->db->set("stok",$stok);
        $this->db->where("id_darah",$id);
        return $this->db->update($this->table);
    }

    public function riwayat_bulanan(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_By("created_at","DESC");
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array();
        }
    }

    public function update($id_penerimaan,$data){
        $this->db->set($data);
        $this->db->where("id_penerimaan",$id_penerimaan);
        return $this->db->update($this->table);
    }

    public function reaksi_darah(){
        $this->db->select('*');
        $this->db->from($this->table);
        
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result_array();
        }
    }

    public function riwayat_pesan($id_user){
        $this->db->where("id_user",$id_user);
        $this->db->from($this->table);
        $this->db->order_by("created_at","DESC");
        return $this->db->select("*")->get()->result_array();
    }

    public function reaksi($id){
        return $this->db->get_where($this->table,["id_penerimaan"=>$id])->result();
    }

}

 