<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Luar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("M_absen");
	}

	private function _rules(){
		return [
			[
				"field"=>"nama",
				"label"=>"nama",
				"rules"=>"required"
			],
			[
				"field"=>"absen",
				"label"=>"absen",
				"rules"=>"required"
			],
		];
	}

	private function _upload(){
		$config['upload_path']          = './assets/gambar/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
    $config['file_name']            = preg_replace("/[^a-zA-Z0-9]/", "",$this->input->post("nama"))."-".preg_replace("/[^a-zA-Z0-9]/", "", $this->input->post('absen'));
    $config['overwrite']						= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
        return $this->upload->data("file_name");
    }

    return "default.png";
	}

	private function view_berkali(){
		$view=$this->M_absen->view_berkali_kali()->berapa_kali;
		if ($view=="bisa") {
			return "bisa";
		}elseif($view=="tidak") {
			return "tidak";
		}else{
			return "gagal";
		}
	}

	public function index()
	{
		$this->load->model("M_admin");
		date_default_timezone_set('Asia/Jakarta');
		if ($this->M_admin->view_open_form()->buka_or_tutup=="tutup") {
			$data['title']="Form ditutup";
			$this->load->view("header",$data);
			$this->load->view("tutup");
			$this->load->view("footer");
		}else{
			$nama=$this->input->post('nama');
			$absen=$this->input->post('absen');
			$gmail=$this->input->post('email');
			$datane=[
				"nama"=>$nama,
				"absen"=>$absen,
				"waktu"=>date("Y-m-d H:i:s"),
				"email"=>$gmail,
				"screenshots"=>$this->_upload()
			];
			if ($this->form_validation->set_rules($this->_rules())->run()) {
				if($this->M_admin->view_rows_form($absen)->num_rows()>0){
					$this->session->set_flashdata("absen_diisi","Absen telah di isi, silahkan cek kembali/hubungi admin.");
				}else{
					if ($this->M_absen->input_absen($datane)) {
						// $this->session->sess_expiration=1;
						if($this->view_berkali()=="tidak"){
							$this->session->set_userdata("sudah_input","Anda sudah absen!");
							redirect(base_url());
						}elseif ($this->view_berkali()=="bisa") {
							$this->session->set_flashdata("success_input","Absennya sukses:)");
							redirect(base_url());
						}elseif($this->view_berkali()=="gagal") {
							redirect(base_url("maintenance"));
						}
					}else {
						$this->session->set_flashdata("gagal_input","Absennya gagal!");
					}
				}
			}
			$data['count_absen']=$this->M_admin->count_absen()->absen;
			$data["title"]="Absensi";
			// $data['view_buat']=$this->view_berkali();
			$this->load->view("header",$data);
			$this->load->view("index");
			$this->load->view("footer");
		}
	}

	public function cek()
	{
		$data["row"]=$this->M_absen->view_all();
		$data['title']="Cek absensi";
		$this->load->view("header",$data);
		$this->load->view("cek_absen",$data);
		$this->load->view("footer");
	}

	public function maintenance()
	{
		$this->load->view("maintenance");
	}

	// public function out()
	// {
	// 	$this->session->unset_userdata("sudah_input");
	// 	redirect(base_url());
	// }

}
