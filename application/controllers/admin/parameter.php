<?php
class Parameter extends MY_Controller
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

  //profile company
  function profile_company()
  {
    $data = [
      'data' => $this->m_crud->select('*', 'tbl_pt', 'pt_id', '1')->row_array(),
    ];
    $this->render('admin/v_parameter_profile', $data);
  }

  function profile_company_update()
  {
    $data = [
      'pt_nama' => $this->input->post('pt_nama'),
      'pt_npwp' => $this->input->post('pt_npwp'),
      'pt_alamat' => $this->input->post('pt_alamat'),
      'pt_negara' => $this->input->post('pt_negara'),
      'pt_nama_pic' => $this->input->post('pt_nama_pic'),
      'pt_telp_pic' => $this->input->post('pt_telp_pic'),
      'pt_email' => $this->input->post('pt_email'),
      'pt_website' => $this->input->post('pt_website'),
    ];
    $this->m_crud->update('tbl_pt', $data, 'pt_id', $this->input->post('pt_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['pt_nama'] . '</b> Berhasil diupdate.</div>');
    redirect('admin/parameter/profile_company');
  }

  //wewenang menu
  function wewenang()
  {
    $data = [
      'data' => $this->m_crud->read('tbl_level'),
    ];
    $this->render('admin/v_parameter_wewenang', $data);
  }

  function reset_wewenang()
  {
    if ($this->input->post('wewenang')) {
      // $allSelectedMenu = implode(',' , );
      if (array_search('1', $_POST['wewenang']) !== FALSE) {
        $parameter = "Y";
      }
      if (array_search('2', $_POST['wewenang']) !== FALSE) {
        $katalog = "Y";
      }
      if (array_search('3', $_POST['wewenang']) !== FALSE) {
        $pos = "Y";
      }
      if (array_search('4', $_POST['wewenang']) !== FALSE) {
        $laporan = "Y";
      }
      if (array_search('5', $_POST['wewenang']) !== FALSE) {
        $sistem = "Y";
      }
      if (array_search('6', $_POST['wewenang']) !== FALSE) {
        $import = "Y";
      }
      if (array_search('7', $_POST['wewenang']) !== FALSE) {
        $user = "Y";
      }
      $id = $this->uri->segment(4);
      $data = [
        'parameter' => $parameter,
        'katalog' => $katalog,
        'pos' => $pos,
        'laporan' => $laporan,
        'sistem' => $sistem,
        'import_data' => $import,
        'user' => $user,
      ];

      $this->m_crud->update('tbl_level', $data, 'level_id', $id);
      $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b> wewenang berhasil di update </div>');
    } else {
      $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b></b> Tidak ada data di pass</div>');
    }
    redirect('admin/parameter/wewenang');
  }

  function hapus_wewenang()
  {
    $this->m_crud->delete('tbl_outlet', 'out_id', $this->input->post('out_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Outlet <b>' . $this->input->post('out_nama') . '</b> Berhasil dihapus dari database.</div>');
    redirect('admin/parameter/outlet');
  }



  function outlet()
  {
    $data = [
      'data' => $this->m_crud->read('tbl_outlet'),
    ];
    $this->render('admin/v_parameter_outlet', $data);
  }

  function simpan_outlet()
  {
    $data =  [
      'out_kode' => $this->input->post('out_kode'),
      'out_nama' => $this->input->post('out_nama'),
      'out_alamat' => $this->input->post('out_alamat'),
      'out_telp' => $this->input->post('out_telp'),
      'out_email' => $this->input->post('out_email'),
      'out_nm_pic' => $this->input->post('out_nm_pic'),
      'area_id' => $this->input->post('area_id'),
    ];

    if (!$this->input->post('out_id')) {
      $this->m_crud->insert('tbl_outlet', $data);
    }
    $this->m_crud->update('tbl_outlet', $data, 'out_id', $this->input->post('out_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['out_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
    redirect('admin/parameter/outlet');
  }

  function hapus_outlet()
  {
    $this->m_crud->delete('tbl_outlet', 'out_id', $this->input->post('out_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Outlet <b>' . $this->input->post('out_nama') . '</b> Berhasil dihapus dari database.</div>');
    redirect('admin/parameter/outlet');
  }

  function pelanggan()
  {
    $data = [
      'data' => $this->m_crud->read('tbl_pelanggan'),
    ];
    $this->render('admin/v_parameter_pelanggan', $data);
  }

  function simpan_pelanggan()
  {
    $data =  [
      'plg_nama' => $this->input->post('plg_nama'),
      'plg_alamat' => $this->input->post('plg_alamat'),
      'plg_jenkel' => $this->input->post('plg_jenkel'),
      'plg_notelp' => $this->input->post('plg_notelp'),
      'plg_email' => $this->input->post('plg_email'),
      'plg_whatsapp' => $this->input->post('plg_whatsapp'),
      'plg_password' => md5($this->input->post('plg_password')),
    ];

    if ($this->input->post('plg_password') !== $this->input->post('plg_password2')) {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password dan Ulangi Password yang Anda masukan tidak sama.</div>');
      redirect('admin/parameter/pelanggan');
    }
    if (!$this->input->post('plg_id')) {
      $this->m_crud->insert('tbl_pelanggan', $data);
      redirect('admin/parameter/pelanggan');
      $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['plg_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
    }
    $this->m_crud->update('tbl_pelanggan', $data, 'plg_id', $this->input->post('plg_id'));
    redirect('admin/parameter/pelanggan');
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['plg_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
  }

  function hapus_pelanggan()
  {
    $this->m_crud->delete('tbl_pelanggan', 'plg_id', $this->input->post('plg_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Outlet <b>' . $this->input->post('out_nama') . '</b> Berhasil dihapus dari database.</div>');
    redirect('admin/parameter/pelanggan');
  }

  function get_grafik_pelanggan()
  {
    $query = $this->db->query("SELECT DATE_FORMAT(plg_register,'%M') AS bulan,COUNT(plg_id) AS total FROM tbl_pelanggan WHERE YEAR(plg_register)=YEAR(CURDATE()) GROUP BY MONTH(plg_register)");

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $data) {
        $hasil[] = $data;
      }
      return $hasil;
    }
  }

  function supplier()
  {
    $data = [
      'data' => $this->m_crud->read('tbl_supplier'),
    ];
    $this->render('admin/v_parameter_supplier', $data);
  }

  function simpan_supplier()
  {
    $data = [
      'supplier_kode' => $this->input->post('supplier_kode'),
      'supplier_nama' => $this->input->post('supplier_nama'),
      'supplier_alamat' => $this->input->post('supplier_alamat'),
      'supplier_telp' => $this->input->post('supplier_telp'),
      'supplier_pic' => $this->input->post('supplier_pic'),
      'supplier_email' => $this->input->post('supplier_email'),
    ];

    if (!$this->input->post('supplier_id')) {
      $this->m_crud->insert('tbl_supplier', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['out_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
      redirect('admin/parameter/supplier');
    }
    $this->m_crud->update('tbl_supplier', $data, 'supplier_id', $this->input->post('supplier_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['out_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
    redirect('admin/parameter/supplier');
  }

  function hapus_supplier()
  {
    $this->m_crud->delete('tbl_supplier', 'supplier_id', $this->input->post('supplier_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Supplier <b>' . $this->input->post('out_nama') . '</b> Berhasil dihapus dari database.</div>');
    redirect('admin/parameter/supplier');
  }

  //tax
  public function tax()
  {
    $data = [
      'data' => $this->m_crud->read('tbl_tax'),
    ];
    $this->render('admin/v_parameter_tax', $data);
  }

  public function simpan_tax()
  {
    $data = [
      'tax_nm' => $this->input->post('tax_nm'),
      'tax_persen' => $this->input->post('tax_persen')
    ];
    if (!$this->input->post('tax_id')) {
      $this->m_crud->insert('tbl_tax', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['tax_nm'] . '</b> Berhasil ditambah/diupdate.</div>');
      redirect('admin/parameter/tax');
    }
    $this->m_crud->update('tbl_tax', $data, 'tax_id', $this->input->post('tax_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['tax_nm'] . '</b> Berhasil ditambah/diupdate.</div>');
    redirect('admin/parameter/tax');
  }

  public function hapus_tax($tax_id)
  {
    $this->m_crud->delete('tbl_tax', 'tax_id', $tax_id);
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Mater <b>' . $this->input->post('tax_nm') . '</b> Berhasil dihapus.</div>');
    redirect('admin/parameter/tax');
  }
}