<?php
class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('login');
			redirect($url);
		};
		$this->load->model('m_parameter');
		$this->load->model('m_order');
	}

	function index()
	{
		$data = [
			'plg' => $this->m_parameter->get_all_pelanggan_terbaru(),
			'odr' => $this->m_order->get_all_order(),
			'statistik' => $this->m_order->get_grafik_penjualan(),
			'statistikplg' => $this->m_parameter->get_grafik_pelanggan(),
			'pen_now' => $this->m_order->get_total_penjualan_sekarang(),
			'pen_last' => $this->m_order->get_total_penjualan_bulan_lalu(),
			'tot_porsi' => $this->m_order->get_total_porsi_terjual_bulan_ini(),
			'tot_plg' => $this->m_order->get_tatal_pelanggan(),
		];
		$this->render('admin/v_dashboard', $data);
	}
}