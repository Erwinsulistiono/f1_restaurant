<?php
class Katalog extends MY_Controller
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

    //menu
    function menu()
    {
      $data = [
			  'kat' => $this->m_crud->read('tbl_kategori'),
        'data' => $this->m_crud->read('tbl_menu'),
        'test' => $this->m_crud->select('*', 'tbl_kategori', 'kategori_id' , 1),
		  ];
      $this->render('admin/v_katalog_menu',$data);
    }

    function simpan_menu()
    {
      $nmfile = "file_".time().'.jpg'; //nama file saya beri nama langsung dan diikuti fungsi time
      $config['upload_path'] = './assets/gambar/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['max_size'] = '1024'; //maksimum besar file 2M
      $config['max_width']  = '900'; //lebar maksimum 1288 px
      $config['max_height']  = '800'; //tinggi maksimu 1000 px
      $config['file_name'] = $nmfile; //nama yang terupload nantinya
          
      $this->upload->initialize($config);
      $gbr = $this->upload->data();
      $kategori_id = $this->input->post('menu_kategori');
      $kategori_nama = $this->m_crud->select('*', 'tbl_kategori', 'kategori_id' , $kategori_id)->row_array();
          
      if(empty($_FILES['filefoto']['name']) || !$this->upload->do_upload('filefoto'))
      {
        $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
        redirect('admin/katalog/menu');
      }
          
      $data = [
        'menu_gambar' => $gbr['file_name'],
        'menu_nama' => $this->input->post('menu_nama'),
        'menu_deskripsi' => $this->input->post('menu_deskripsi'),
        'menu_harga_lama' => $this->input->post('menu_harga_lama'),
        'menu_harga_baru' => $this->input->post('menu_harga_baru'),
        'menu_kategori_id' => $kategori_id,
        'menu_kategori_nama'=> $kategori_nama['kategori_nama'],
      ];

      if (!$this->input->post('menu_id')) {
        $this->m_crud->insert('tbl_menu', $data);
        $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$data['menu_nama'].'</b> Berhasil disimpan ke database.</div>');
        redirect('admin/katalog/menu');
      } 
      $this->m_crud->update('tbl_menu', $data, 'menu_id', $this->input->post('menu_id'));
      $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$data['menu_nama'].'</b> Berhasil disimpan ke database.</div>');
      redirect('admin/katalog/menu');
    }

	function hapus_menu()
	{
		$this->m_crud->delete('tbl_menu', 'menu_id', $this->input->post('menu_id'));
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$this->input->post('menu_nama').'</b> Berhasil dihapus dari database.</div>');
		redirect('admin/katalog/menu');
  }
  
  //kategori
  function kategori_menu()
    {
      $data = [
			  'data' => $this->m_crud->read('tbl_kategori'),
		  ];
      $this->render('admin/v_katalog_kategori_menu',$data);
    }

    function simpan_kategori_menu()
    {
      $data = [
        'kategori_nama' => $this->input->post('kategori_nama'),
      ];

      if (!$this->input->post('menu_id')) {
        $this->m_crud->insert('tbl_kategori', $data);
        $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$data['kategori_nama'].'</b> Berhasil disimpan ke database.</div>');
        redirect('admin/katalog/kategori_menu');
      } 
      $this->m_crud->update('tbl_kategori', $data, 'kategori_id', $this->input->post('kategori_id'));
      $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$data['kategori_nama'].'</b> Berhasil disimpan ke database.</div>');
      redirect('admin/katalog/kategori_menu');
    }

	function hapus_kategori_menu()
	{
		$this->m_crud->delete('tbl_kategori', 'kategori_id', $this->input->post('kategori_id'));
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>kategori <b>'.$this->input->post('kategori_nama').'</b> Berhasil dihapus dari database.</div>');
		redirect('admin/katalog/kategori_menu');
  }
  
  //kupon
  function kupon()
    {
      $data = [
			  'data' => $this->m_crud->read('tbl_kupon'),
		  ];
      $this->render('admin/v_katalog_kupon',$data);
    }

    function simpan_kupon()
    {     
      if ($this->input->post('jenis_diskon') == 'discount'){
        $discount = $this->input->post('kupon_diskon');
        $nominal = 0;
      }else{
        $nominal = $this->input->post('kupon_diskon');
        $discount = 0;
      }

      $data = [
        'kupon_kode' => $this->input->post('kupon_kode'),
        'kupon_nama' => $this->input->post('kupon_nama'),
        'kupon_nominal' => $nominal,
        'kupon_discount' => $discount,
        'kupon_periode_awal' => $this->input->post('kupon_periode_awal'),
        'kupon_periode_akhir' => $this->input->post('kupon_periode_akhir'),
        'kupon_limit' => $this->input->post('kupon_limit'),
        'kupon_syarat' => $this->input->post('kupon_syarat'),
      ];

      if (!$this->input->post('kupon_id')) {
         $this->m_crud->insert('tbl_kupon', $data);
         $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kupon <b>'.$data['kupon_nama'].'</b> Berhasil disimpan ke database.</div>');
         redirect('admin/katalog/kategori_menu');
      } 
      $this->m_crud->update('tbl_kupon', $data, 'kupon_id', $this->input->post('kupon_id'));
      $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Kupon <b>'.$data['kupon_nama'].'</b> Berhasil disimpan ke database.</div>');
      redirect('admin/katalog/kupon');
    }

	function hapus_kupon()
	{
		$this->m_crud->delete('tbl_kupon', 'kupon_id', $this->input->post('kupon_id'));
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>kupon <b>'.$this->input->post('kupon_nama').'</b> Berhasil dihapus dari database.</div>');
		redirect('admin/katalog/kupon');
  }


  //gallery
  function gallery(){
		
		$data = array(
			'data' => $this->m_crud->read('tbl_galeri'),
		);
		$this->render('admin/v_gallery',$data);
	}

	function simpan_gallery()
  {
    $nmfile = "file_".time().'.jpg'; //nama file saya beri nama langsung dan diikuti fungsi time
    $config['upload_path'] = './assets/galeries'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['max_size'] = '1024'; //maksimum besar file 2M
    $config['max_width']  = '900'; //lebar maksimum 1288 px
    $config['max_height']  = '800'; //tinggi maksimu 1000 px
    $config['file_name'] = $nmfile; //nama yang terupload nantinya
        
    $this->upload->initialize($config);
    $gbr = $this->upload->data();
        
    if(empty($_FILES['filefoto']['name']) || !$this->upload->do_upload('filefoto'))
    {
      $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu tidak dapat ditambahkan, gambar tidak dapat diupload</div>');
      redirect('admin/katalog/gallery');
    }
        
    $data = [
      'galeri_gambar' => $gbr['file_name'],
      'galeri_judul' => $this->input->post('galeri_judul'),
      'galeri_deskripsi' => $this->input->post('galeri_deskripsi'),
    ];

    if (!$this->input->post('galeri_id')) {
      $this->m_crud->insert('tbl_galeri', $data);
      $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gallery <b>'.$data['galeri_judul'].'</b> Berhasil disimpan ke database.</div>');
      redirect('admin/katalog/gallery');
    } 
    $this->m_crud->update('tbl_galeri', $data, 'galeri_id', $this->input->post('galeri_id'));
    $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gallery <b>'.$data['galeri_judul'].'</b> Berhasil disimpan ke database.</div>');
    redirect('admin/katalog/gallery');
  }

  function hapus_gallery()
	{
		$this->m_crud->delete('tbl_galeri', 'galeri_id', $this->input->post('galeri_id'));
		$this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Gallery <b>'.$this->input->post('galeri_judul').'</b> Berhasil dihapus dari database.</div>');
		redirect('admin/katalog/gallery');
  }
  

}