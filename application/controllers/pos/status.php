<?php
class Status extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE)
		{
      $url=base_url('login');
      redirect($url);
    };
		$this->load->model('m_status');
		$this->load->model('m_pengguna');
	}


	function index()
	{
		$kode=$this->session->userdata('idadmin');
		$x = array(
			'user' => $this->m_pengguna->get_pengguna_login($kode),
			'data' => $this->m_status->get_all_status(),
		);
		$this->load->view('layouts/v_head',$x);
		$this->load->view('layouts/v_header',$x);
		$this->load->view('pos/v_status',$x);
		$this->load->view('layouts/v_sidebar_pos',$x);
		$this->load->view('layouts/v_footer',$x);
	}


	function simpan_status()
	{
		$status=str_replace("'", "", $this->input->post('status'));
		$this->m_status->simpan_status($status);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Status Order <b>'.$status.'</b> Berhasil ditambahkan ke database.</div>');
	  redirect('pos/status');
	}

	function update_status()
	{
		$kode=$this->input->post('kode');
		$status=str_replace("'", "", $this->input->post('status'));
		$this->m_status->update_status($kode,$status);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Status Order <b>'.$status.'</b> Berhasil diupdate.</div>');
	  redirect('pos/status');
	}


	function hapus_status()
	{
		$kode=$this->input->post('kode');
		$status=str_replace("'", "", $this->input->post('status'));
		$this->m_status->hapus_status($kode);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Status Order <b>'.$status.'</b> Berhasil dihapus.</div>');
	  redirect('pos/status');
	}
}