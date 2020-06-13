<?php
class Order extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE)
		{
			$url=base_url('login');
			redirect($url);
		};
		$this->load->model('m_order');
		$this->load->model('m_status');
		$this->load->model('m_pengguna');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x = array(
			'user' => $this->m_pengguna->get_pengguna_login($kode),
			'data' => $this->m_order->get_all_order(),
			'stts' => $this->m_status->get_all_status(),
		);
		$this->load->view('layouts/v_head',$x);
		$this->load->view('layouts/v_header',$x);
		$this->load->view('admin/v_order',$x);
		$this->load->view('layouts/v_sidebar',$x);
		$this->load->view('layouts/v_footer',$x);
	}
	
	function update_order(){
		$kode=$this->input->post('kode');
		$status=str_replace("'", "", $this->input->post('status'));
		$this->m_order->update_order($kode,$status);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Status order untuk No Invoice: <b>'.$kode.'</b> Berhasil diupdate.</div>');
	  redirect('admin/order');
	}
	function hapus_order(){
		$kode=$this->input->post('kode');
		$this->m_order->hapus_order($kode);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Order untuk invoice: <b>'.$kode.'</b> Berhasil dihapus.</div>');
	  redirect('admin/order');
	}


}