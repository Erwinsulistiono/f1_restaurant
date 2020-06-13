<?php
class Profile extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url('login');
			redirect($url);
		};
		$this->load->model('m_crud');
		$this->load->library('upload');
	}

	function index()
	{
		$this->render('admin/v_profile');
	}

	function update()
	{
		$data = [
			'pengguna_username' => $this->input->post('username'),
			'pengguna_password' => md5($this->input->post('password')),
			'pengguna_email' => $this->input->post('email'),
			'pengguna_nohp' => $this->input->post('kontak'),
		];

		if ($this->input->post('password2') !== $this->input->post('password2')) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
			redirect('admin/profile');
		} else {
			$this->m_crud->update('tbl_pengguna', $data, 'pengguna_id', $this->session->userdata('idadmin'));
			$this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>' . $this->session->userdata('nama') . '</b> Berhasil diupdate.</div>');
			redirect('login/logout');
		}
	}
}