<?php
class M_parameter extends CI_Model
{
  function get_all_pelanggan_terbaru()
  {
    $hsl = $this->db->query("select * from tbl_pelanggan order by plg_id desc");
    return $hsl;
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
}