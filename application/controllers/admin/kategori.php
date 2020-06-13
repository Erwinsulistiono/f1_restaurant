<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_pengguna');
	}

	function index(){
		$data = array(
			'data' => $this->m_kategori->get_all_kategori(),
		);
		$this->load->view('layouts/v_head');
		$this->load->view('layouts/v_header');
		$this->load->view('admin/v_kategori',$data);
		$this->load->view('layouts/v_sidebar');
		$this->load->view('layouts/v_footer');
	}
	function simpan_kategori(){
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->simpan_kategori($kategori);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil ditambahkan ke database.</div>');
	    redirect('admin/kategori');
	}

	function update_kategori(){
		$kode=$this->input->post('kode');
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->update_kategori($kode,$kategori);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil diupdate.</div>');
	    redirect('admin/kategori');
	}
	function hapus_kategori(){
		$kode=$this->input->post('kode');
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->hapus_kategori($kode);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil dihapus.</div>');
	    redirect('admin/kategori');
	}


}