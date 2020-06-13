<?php
class Pelanggan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('login');
			redirect($url);
		};
		$this->load->model('m_pelanggan');
		$this->load->library('upload');
		$this->load->model('m_pengguna');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
		$x = array(
			'user' => $this->m_pengguna->get_pengguna_login($kode),
			'data' => $this->m_pelanggan->get_all_pelanggan(),
		);
		$this->load->view('layouts/v_head',$x);
		$this->load->view('layouts/v_header',$x);
		$this->load->view('pos/v_pelanggan',$x);
		$this->load->view('layouts/v_sidebar_pos',$x);
		$this->load->view('layouts/v_footer',$x);
	}

	function hapus_pelanggan(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_pelanggan->hapus_pelanggan($kode);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pelanggan <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	  redirect('pos/pelanggan');
	}

}