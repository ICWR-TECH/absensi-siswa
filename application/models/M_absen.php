<?php
defined("BASEPATH") OR exit("403");
/**
 *
 */
class M_absen extends CI_Model
{

  function input_absen($data){
    return $this->db->insert("absen",$data);
  }

  function view_all(){
    return $this->db->order_by("id","DESC")->get("absen")->result();
  }

  function login_admin($data){
    return $this->db->get_where("admin",$data);
  }

  function delete_absen($data){
    return $this->db->delete("absen");
  }

  function view_berkali_kali(){
    return $this->db->get_where("buat",['id'=>1])->row();
  }
}

 ?>
