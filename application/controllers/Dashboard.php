<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Dashboard extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata("status")!="login") {
      show_404();
      exit;
    }
    $this->load->model("M_admin");
  }

  private function _deleteImageAll(){
    $data=$this->M_admin->view_all_delete();

    foreach ($data as $var) {
      if ($var->screenshots!="default.png") {
        unlink("assets/gambar/".$var->screenshots);
      }
    }
    return true;
  }

  private function _deleteImageName($name){
    if($name!="default.png"){
      unlink("assets/gambar/".$name);
      return true;
    }else{
      return true;
    }
  }

  public function index()
  {
    $data['row']=$this->M_admin->view_all();
    $data['title']="Dashboard";
    $this->load->view("admin",$data);
  }

  public function create_form()
  {
    date_default_timezone_set('Asia/Jakarta');
    $cek=$this->input->post("atur");
    $date=date("Y-m-d H:i:s");
    $berapa_absen=$this->input->post("absen");
    $data=['dibuat_pada'=>$date,"buka_or_tutup"=>$cek,"absen"=>$berapa_absen,"berapa_kali"=>$this->input->post("berapa_kali")];
    if ($this->input->post()) {
      $rules=[
        ["field"=>"atur","label"=>"Atur","rules"=>"required"],
        ["field"=>"absen","label"=>"Absen","rules"=>"required"],
        ['field'=>"berapa_kali","label"=>"Berapa kali","rules"=>"required"]
      ];
      if($this->form_validation->set_rules($rules)->run()){
        if ($this->M_admin->open_form($data)) {
          $this->session->set_flashdata("form_update","Sudah <strong>".$cek."</strong>!");
          redirect(base_url("dashboard/create_form"));
        }
      }else {
        $this->session->set_flashdata("cek_atur","Silahkan cek form kembali");
        redirect(base_url("dashboard/create_form"));
      }
    }
    $data['title']="Create form";
    $this->load->view("create_form_admin.php",$data);
  }

  function hapus($id=null){
    if (!$id) {
      show_404();
    }
    $nama_gambar=$this->M_admin->ambil_id(['id'=>$id]);
    if ($this->M_admin->hapus_absen(['id'=>$id])) {
      if($this->_deleteImageName($nama_gambar->screenshots)){
        $this->session->set_flashdata("data_terhapus","Berhasil <stong>Hapus</strong> data!");
        redirect(base_url("dashboard"));
      }
    }
  }

  function hapus_data(){
    if($this->_deleteImageAll()){
      if ($this->M_admin->hapus_data_semua()) {
        $this->session->set_flashdata("hapus_data_semua","Hapus data berhasil!");
        redirect(base_url("dashboard"));
      }
    }
  }

  public function user()
  {

    $rules=[
      [
        "field"=>"username",
        "label"=>"Username",
        "rules"=>"required"
      ],
      [
        "field"=>"password",
        "label"=>"Password",
        "rules"=>"required"
      ]
    ];

    $username=$this->input->post("username");
    $password=md5($this->input->post("password"));

    $datane=[
      "username"=>$username,
      "password"=>$password
    ];

    if ($this->input->post()) {
      if ($this->form_validation->set_rules($rules)->run()) {
        if ($this->M_admin->createUser($datane)) {
          $this->session->set_flashdata("sukses_tambah_user","Sukses create user!");
          redirect(base_url("dashboard/user"));
        }
      }
    }

    $data['row']=$this->M_admin->viewUser();
    $this->load->view("view_user/index",$data);
  }

  public function hapus_user($id=null)
  {
    if (!$id) {
      show_404();
    }
    if($this->M_admin->viewUserId(['id'=>$id])==1){
      if ($this->M_admin->hapusUser(['id'=>$id])) {
        $this->session->set_flashdata("suksesHapusUser","Sukses hapus user");
        redirect(base_url("dashboard/user"));
      }
    }else {
      show_404();
    }
  }

  function out(){
    $this->session->unset_userdata("status");
    redirect(base_url()."admin");
    exit;
  }
}

 ?>
