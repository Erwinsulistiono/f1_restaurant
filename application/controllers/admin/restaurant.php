<?php
class Restaurant extends MY_Controller
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

  function area()
  {
    $data = [
      'data' => $this->m_crud->read('tbl_area'),
    ];
    $this->render('admin/v_restaurant_area', $data);
  }

  public function simpan_area()
  {
    $data = [
      'area_nama' => $this->input->post('area_nama'),
      'area_level' => $this->input->post('area_level')
    ];
    if (!$this->input->post('area_id')) {
      $this->m_crud->insert('tbl_area', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['area_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
      redirect('admin/restaurant/area');
    }
    $this->m_crud->update('tbl_area', $data, 'area_id', $this->input->post('area_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['area_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
    redirect('admin/restaurant/area');
  }

  public function hapus_area($area_id)
  {
    $this->m_crud->delete('tbl_area', 'area_id', $area_id);
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Area Berhasil dihapus.</div>');
    redirect('admin/restaurant/area');
  }

  function meja()
  {
    $data = [
      'data' => $this->m_crud->left_join('tbl_meja', 'tbl_area', 'tbl_meja.meja_lokasi = tbl_area.area_id'),
    ];
    $this->render('admin/v_restaurant_meja', $data);
  }

  public function simpan_meja()
  {
    $data = [
      'meja_nama' => $this->input->post('meja_nama'),
      'meja_lokasi' => $this->input->post('meja_lokasi'),
      'meja_ket' => $this->input->post('meja_ket'),
    ];
    if (!$this->input->post('meja_id')) {
      $this->m_crud->insert('tbl_meja', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['meja_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
      redirect('admin/restaurant/meja');
    }
    $this->m_crud->update('tbl_area', $data, 'area_id', $this->input->post('area_id'));
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><b>' . $data['meja_nama'] . '</b> Berhasil ditambah/diupdate.</div>');
    redirect('admin/restaurant/meja');
  }

  public function hapus_meja($meja_id)
  {
    $this->m_crud->delete('tbl_meja', 'meja_id', $meja_id);
    $this->session->set_flashdata('msg', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Table Berhasil dihapus.</div>');
    redirect('admin/restaurant/meja');
  }
}