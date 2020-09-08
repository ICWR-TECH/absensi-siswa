<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();

    if ($this->session->userdata("status")=="login") {
      redirect(base_url("dashboard"));
      exit;
    }

    $this->load->model("M_admin");
  }

  public function index()
  {
    $username=$this->input->post("username");
    $password=md5($this->input->post("password"));
    $data=['username'=>$username,"password"=>$password];
    if($this->input->post()){
        $ses=[
          'nama'=>$username,
          "status"=>"login"
        ];

        if($this->M_admin->login($data)->num_rows()>0){
          $this->session->set_userdata($ses);
          redirect("dashboard");
        }else {
          $this->session->set_flashdata("gagal_login","Anda gagal login, silahkan cek username dan password anda kembali");
          redirect(base_url("admin"));
        }
    }
    $this->load->view("login");
  }

}


 ?>
