<?php
class Pengguna extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE)
		{
			$url=base_url('login');
			redirect($url);
		};
		$this->load->model('m_pengguna');
		$this->load->model('m_crud');
		$this->load->library('upload');
	}


	function index()
	{
		$data = [
			'level' => $this->m_crud->read('tbl_level'),
			'data' => $this->m_crud->left_join( 'tbl_pengguna', 'tbl_level', 'tbl_pengguna.pengguna_level = tbl_level.level_id'),
			//($table, $table2, $field_join)
		];
		$this->render('admin/v_pengguna',$data);
	}

	function simpan_pengguna()
	{
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '1024'; //maksimum besar file 1M
		$config['max_width']  = '900'; //lebar maksimum 1288 px
		$config['max_height']  = '800'; //tinggi maksimu 1000 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($config);
		$gbr = $this->upload->data();
		$password = $this->input->post('pengguna_password');
		if (empty($password)){
			$pass = $this->m_crud->select('*', 'tbl_pengguna', 'pengguna_id', $this->input->post('pengguna_id'))->row_array();
			$password = $password['pengguna_password'];
		}
		if ($this->input->post('pengguna_password') !== $this->input->post('pengguna_password2')){
			$this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>password tidak match.</div>');
			redirect('admin/pengguna');
		}
          
		$data = [
			'pengguna_nama' => $this->input->post('pengguna_nama'),
			'pengguna_jenkel' => $this->input->post('pengguna_jenkel'),
			'pengguna_username' => $this->input->post('pengguna_username'),
			'pengguna_password' => md5($password),
			'pengguna_email' => $this->input->post('pengguna_email'),
			'pengguna_nohp' => $this->input->post('pengguna_nohp'),
			'pengguna_level'=> $this->input->post('pengguna_level'),
			'pengguna_photo'=> $gbr['file_name'],
		];

		if (!$this->input->post('pengguna_id')) {
			$this->m_crud->insert('tbl_pengguna', $data);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>pengguna <b>'.$data['pengguna_nama'].'</b> Berhasil disimpan ke database.</div>');
			redirect('admin/pengguna');
		} 
		$this->m_crud->update('tbl_pengguna', $data, 'pengguna_id', $this->input->post('pengguna_id'));
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>pengguna <b>'.$data['pengguna_nama'].'</b> Berhasil '.$password.' disimpan ke database.</div>');
		redirect('admin/pengguna');
	}
	
	function hapus_pengguna()
	{
		$this->m_crud->delete('tbl_pengguna', 'pengguna_id', $this->input->post('pengguna_id'));
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$this->input->post('pengguna_id').'</b> Berhasil dihapus dari database.</div>');
		redirect('admin/pengguna');
	}

	function reset_password()
	{
		$id = $this->uri->segment(4);
		$get = $this->m_crud->select('*', 'tbl_pengguna', 'pengguna_id', $id)->row_array();
		$pass = rand(123456,999999);
		$data = [
			'pengguna_password' => md5($pass),
		];
		$this->m_crud->update('tbl_pengguna', $data, 'pengguna_id', $id);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Username : <b>'.$get['pengguna_username'].'</b> <br/> Password baru : <b>'.$pass.'</b></div>');
		redirect('admin/pengguna');
  }
}