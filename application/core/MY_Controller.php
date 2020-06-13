<?php
class MY_Controller extends CI_Controller
{
	function __construct() 
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
		$url = base_url('login');
		redirect($url);
		};
		$this->load->model('m_crud');
	}
	
	function render($view,$data = null)
	{	
		$title['title'] = "F1 Restaurant";
		$sidebar['menu'] = $this->m_crud->select('*', 'tbl_pengguna', 'pengguna_id', $this->session->userdata('idadmin'))->row_array();

        $this->load->view('layouts/v_head', $title);
		$this->load->view('layouts/v_header');
		$this->load->view($view, $data);
		$this->load->view('layouts/v_sidebar', $sidebar);
		$this->load->view('layouts/v_footer');
	}
}