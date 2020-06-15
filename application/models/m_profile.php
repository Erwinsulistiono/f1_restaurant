<?php
class M_profile extends CI_Model
{
  //UPDATE PENGGUNA //
  function update($data, $id)
  {
    $this->db->where('pengguna_id', $id);
    $this->db->update('tbl_pengguna', $data);
  }
  //END UPDATE PENGGUNA//
}