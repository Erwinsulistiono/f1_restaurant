<?php
class Menu extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
			$url=base_url('login');
			redirect($url);
		};
		$this->load->model('m_menu');
		$this->load->model('m_kategori');
		$this->load->library('upload');
		$this->load->model('m_pengguna');
	}


	function index()
	{
		$kode=$this->session->userdata('idadmin');
		$x = array(
			'user' => $this->m_pengguna->get_pengguna_login($kode),
			'kat' => $this->m_kategori->get_all_kategori(),
			'data' => $this->m_menu->get_all_menu(),
		);
		$this->load->view('layouts/v_head',$x);
		$this->load->view('layouts/v_header',$x);
		$this->load->view('pos/v_menu',$x);
		$this->load->view('layouts/v_sidebar_pos',$x);
		$this->load->view('layouts/v_footer',$x);
	}

	function simpan_menu()
	{
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = './assets/gambar/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '1024'; //maksimum besar file 2M
		$config['max_width']  = '900'; //lebar maksimum 1288 px
		$config['max_height']  = '800'; //tinggi maksimu 1000 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();
				$gambar=$gbr['file_name'];
				$nama=str_replace("'", "", $this->input->post('nama'));
				$deskripsi=str_replace("'", "", $this->input->post('deskripsi'));
				$harga=str_replace("'", "", $this->input->post('harga'));
				$kategori=str_replace("'", "", $this->input->post('kategori'));
				$a=$this->m_kategori->get_kategori_by_id($kategori);
				$q=$a->row_array();
				$kat_nama=$q['kategori_nama'];
				$this->m_menu->simpan_menu($nama,$deskripsi,$harga,$kategori,$kat_nama,$gambar);
				$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil ditambahkan ke database.</div>');
				redirect('pos/menu');
					
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
				redirect('pos/menu');
			}
				redirect('pos/menu');
		}else{
			redirect('pos/menu');
		} 

	}

	function update_menu()
	{
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = '1024'; //maksimum besar file 2M
		$config['max_width']  = '900'; //lebar maksimum 1288 px
		$config['max_height']  = '800'; //tinggi maksimu 1000 px
		$config['file_name'] = $nmfile; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
				$gbr = $this->upload->data();
				$gambar=$gbr['file_name'];
				$kode=str_replace("'", "", $this->input->post('kode'));
				$nama=str_replace("'", "", $this->input->post('nama'));
				$deskripsi=str_replace("'", "", $this->input->post('deskripsi'));
				$harga_lama=str_replace("'", "", $this->input->post('harga_lama'));
				$harga_baru=str_replace("'", "", $this->input->post('harga_baru'));
				$kategori=str_replace("'", "", $this->input->post('kategori'));
				$a=$this->m_kategori->get_kategori_by_id($kategori);
				$q=$a->row_array();
				$kat_nama=$q['kategori_nama'];
									
			if (empty($harga_baru)) {
				$this->m_menu->update_menu_tanpa_harga_baru($kode,$nama,$deskripsi,$harga_lama,$kategori,$kat_nama,$gambar);
				$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil diupdate.</div>');
				redirect('pos/menu');
			}else{
				$this->m_menu->update_menu_dengan_harga_baru($kode,$nama,$deskripsi,$harga_lama,$harga_baru,$kategori,$kat_nama,$gambar);
				$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil diupdate.</div>');
				redirect('pos/menu');
			}
						
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu tidak dapat diupdate, file gambar yang Anda masukkan terlalu besar.</div>');
			redirect('pos/menu');
		}
			redirect('pos/menu');
		}else{
			$kode=str_replace("'", "", $this->input->post('kode'));
			$nama=str_replace("'", "", $this->input->post('nama'));
			$deskripsi=str_replace("'", "", $this->input->post('deskripsi'));
			$harga_lama=str_replace("'", "", $this->input->post('harga_lama'));
			$harga_baru=str_replace("'", "", $this->input->post('harga_baru'));
			$kategori=str_replace("'", "", $this->input->post('kategori'));
			$a=$this->m_kategori->get_kategori_by_id($kategori);
			$q=$a->row_array();
			$kat_nama=$q['kategori_nama'];

			if (empty($harga_baru)) 
			{
				$this->m_menu->update_menu_tanpa_harga_baru_tanpa_gambar($kode,$nama,$deskripsi,$harga_lama,$kategori,$kat_nama);
				$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil diupdate.</div>');
				redirect('pos/menu');
	}else{
		$this->m_menu->update_menu_dengan_harga_baru_tanpa_gambar($kode,$nama,$deskripsi,$harga_lama,$harga_baru,$kategori,$kat_nama);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil diupdate.</div>');
		redirect('pos/menu');
	}
} 

}

	function hapus_menu()
	{
		$kode=$this->input->post('kode');
		$nama=$this->input->post('kategori');
		$this->m_menu->hapus_menu($kode);
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
		redirect('pos/menu');
	}



}