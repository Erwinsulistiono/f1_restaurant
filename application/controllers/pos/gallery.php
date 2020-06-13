<?php
class Gallery extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('login');
            redirect($url);
        };
		$this->load->model('m_gallery');
		$this->load->library('upload');
		$this->load->model('m_pengguna');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
		$x = array(
			'user' => $this->m_pengguna->get_pengguna_login($kode),
			'data' => $this->m_gallery->get_all_gallery(),
		);
		$this->load->view('layouts/v_head',$x);
		$this->load->view('layouts/v_header',$x);
		$this->load->view('pos/v_gallery',$x);
		$this->load->view('layouts/v_sidebar_pos',$x);
		$this->load->view('layouts/v_footer',$x);
	}

	function simpan_gallery(){
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = './assets/galeries/'; //path folder
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
				$judul=str_replace("'", "", $this->input->post('judul'));
				$deskripsi=str_replace("'", "", $this->input->post('deskripsi'));
						
				$this->m_gallery->simpan_gallery($judul,$deskripsi,$gambar);
				$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar <b>'.$judul.'</b> Berhasil ditambahkan ke database.</div>');
				redirect('pos/gallery');

			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
				redirect('pos/gallery');
			}
					
		}else{
			redirect('pos/gallery');
		} 

	}

	function update_gallery(){
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		$config['upload_path'] = './assets/galeries/'; //path folder
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
				$judul=str_replace("'", "", $this->input->post('judul'));
				$deskripsi=str_replace("'", "", $this->input->post('deskripsi'));

				$this->m_gallery->update_gallery($kode,$judul,$deskripsi,$gambar);
				$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar <b>'.$judul.'</b> Berhasil di update.</div>');
				redirect('pos/gallery');
					
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar tidak dapat di update, file gambar yang Anda masukkan terlalu besar.</div>');
				redirect('pos/gallery');
			}
				
		}else{
			$kode=str_replace("'", "", $this->input->post('kode'));
			$judul=str_replace("'", "", $this->input->post('judul'));
			$deskripsi=str_replace("'", "", $this->input->post('deskripsi'));

			$this->m_gallery->update_gallery_tanpa_gambar($kode,$judul,$deskripsi);
			$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar <b>'.$judul.'</b> Berhasil di update.</div>');
			redirect('pos/gallery');
		} 

	}

	function hapus_gallery(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_gallery->hapus_gallery($kode);
	  $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gambar <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	  redirect('pos/gallery');
	}

	
}