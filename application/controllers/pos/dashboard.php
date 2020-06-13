<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_pelanggan');
		$this->load->model('m_order');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x = array(
			'user' => $this->m_pengguna->get_pengguna_login($kode),
			'plg' => $this->m_pelanggan->get_all_pelanggan_terbaru(),
			'odr' => $this->m_order->get_all_order(),
			'statistik' => $this->m_order->get_grafik_penjualan(),
			'statistikplg' => $this->m_pelanggan->get_grafik_pelanggan(),
			'pen_now' => $this->m_order->get_total_penjualan_sekarang(),
			'pen_last' => $this->m_order->get_total_penjualan_bulan_lalu(),
			'tot_porsi' => $this->m_order->get_total_porsi_terjual_bulan_ini(),
			'tot_plg' => $this->m_order->get_tatal_pelanggan(),
		);
		$this->load->view('layouts/v_head',$x);
		$this->load->view('layouts/v_header',$x);
		$this->load->view('pos/v_dashboard',$x);
		$this->load->view('layouts/v_sidebar_pos',$x);
		$this->load->view('layouts/v_footer',$x);
	}

}