<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class M_admin extends CI_Model
{
  function login($data){
    return $this->db->get_where("admin",$data);
  }

  function view_all(){
    return $this->db->get("absen")->result();
  }

  function open_form($data){
    return $this->db->update("buat",$data,['id'=>1]);
  }

  function view_open_form(){
    return $this->db->get_where("buat",['id'=>1])->row();
  }

  function hapus_absen($id){
    return $this->db->delete("absen",$id);
  }

  function hapus_data_semua(){
    return $this->db->empty_table("absen");
  }

  function view_rows_form($data){
    return $this->db->get_where("absen",["absen"=>$data]);
  }

  function ambil_id($data){
    return $this->db->get_where("absen",$data)->row();
  }

  function count_absen(){
    return $this->db->get_where("buat",['id'=>1])->row();
  }

  function view_all_delete(){
    return $this->db->get("absen")->result();
  }

  function viewUser(){
    return $this->db->get("admin")->result();
  }

  function viewUserId($id){
    return $this->db->get_where("admin",$id)->row();
  }

  function hapusUser($id){
    return $this->db->delete("admin",$id);
  }

  function createUser($data){
    return $this->db->insert("admin",$data);
  }
}



 ?>
