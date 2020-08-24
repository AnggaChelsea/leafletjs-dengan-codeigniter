<?php

defined('BASEPATH') or exit('no direct script acces allowed');


class M_tps extends CI_Model
{

    //ini untuk ambil data
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_tps');
        return $this->db->get()->result_array();
    }


    //ini untuk input data dari map
    public function input_data($data)
    {
        $this->db->insert('tbl_map', $data);
        return $this->db->affected_rows();
    }


     public function requestdata($data)
    {
        $this->db->insert('permintaan', $data);
        return $this->db->affected_rows();
    }
    
    public function permintaan()
    {
        $this->db->select('*');
        $this->db->from('permintaan');
        return $this->db->get()->result_array();
    }

    //edit
    public function edit($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    //ini untunk input data dari kontak
    public function input_pesan($data)
    {
        $this->db->insert('pesan', $data);
        return $this->db->affected_rows();
    }



    //hapus
    public function hapus($table, $where)
    {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }

    public function hapusmenuakses($table, $where)
    {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }


     public function hapusmenuaksesnav($table, $where)
    {
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }
    //detail
    public function detailnya($id)
    {
       return $this->db->get_where('tbl_tps', ['id'=>$id])->row_array();
      
    }

    public function detailpesan($id)
    {
       return $this->db->get_where('permintaan', ['id'=>$id])->row_array();
      
    }

    //ambil data dari database Pesan

    public function pesanmasukk()
    {
        $this->db->select('*');
        $this->db->from('pesan');
        return $this->db->get()->result_array();
    }


//  BAWAH INI SAYA KHUSUS FILE MENU AKSES
    public function aksesuser()
    {
        $this->db->select('*');
        $this->db->from('user_menu');
        return $this->db->get()->result_array();
    }

    public function savemenuakses($data)
    {
        $this->db->insert('user_menu', $data);
        return $this->db->affected_rows();
    }

    //AKHIR FILE MENU AKSES
//////////////////////////////////////////
    //SEKARANG SAYA DISINI MEMBUAT SELECT DAN INSERT KHUSUS MENU SUB MENU MANAGEMENT

     public function submenu()
    {
        $this->db->select('*');
        $this->db->from('user_sub_menu');
        return $this->db->get()->result_array();


        //disini saya membuat join untunk menytukan data satu dengan yang lainnya karna sya butuh id berbentuk nama
    }

    //input submenu
    public function savesubmenu($data)
    {
        $this->db->insert('user_sub_menu', $data);
        return $this->db->affected_rows();
    }

    //---------------------------------------------------------------------//



    //disini saya mau menginputkan untunk database role
    public function savemenurole($data)
    {
        $this->db->insert('user_role', $data);
        return $this->db->affected_rows();
    }


    //menu pengambilan data dari akses Role
     public function aksesrole()
    
    {
        $this->db->select('*');
        $this->db->from('user_role');
        return $this->db->get()->result_array();
    }


    public function menuaksesrole()
    
    {
        $this->db->select('*');
        $this->db->from('user_menu');
        return $this->db->get()->result_array();
    }

    //update profile

    public function updateprofile($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }


    //ubah data lokasi
     public function ubahdatamapnya($id)
    {
       return $this->db->get_where('tbl_tps', ['id'=>$id])->row_array();
    }


    public function ambil_where($where, $table) {

        return $this->db->get_where($table, $where);
        $this->db->get_where($table, $where);
        return $this->db->affected_rows();

    }
}

  //edit data

   //  public function editdatanya($id)
   //  {
   //      $this->db->select('*');
   //      $this->db->from('tbl_tps');
   //      $this->db->where('id', $id);
   //  }
   // GAGAL MAAAAAAAA