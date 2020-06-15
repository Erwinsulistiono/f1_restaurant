<?php
class M_menu extends CI_Model
{

	//MODEL UNTUK MOBILE
	function hot_promo()
	{
		$hsl = $this->db->query("SELECT menu_id,menu_nama,menu_deskripsi,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE (menu_harga_lama-menu_harga_baru)>=0 ORDER BY (menu_harga_lama-menu_harga_baru) DESC");
		return $hsl;
	}
	function makanan()
	{
		$hsl = $this->db->query("SELECT menu_id,menu_nama,menu_deskripsi,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_kategori_id='1' ORDER BY menu_id DESC");
		return $hsl;
	}
	function minuman()
	{
		$hsl = $this->db->query("SELECT menu_id,menu_nama,menu_deskripsi,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_kategori_id='2' ORDER BY menu_id DESC");
		return $hsl;
	}
	function favorite()
	{
		$hsl = $this->db->query("SELECT menu_id,menu_nama,menu_deskripsi,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru,menu_harga_lama,menu_harga_baru,menu_likes,menu_kategori_id,menu_kategori_nama,menu_gambar FROM tbl_menu WHERE menu_likes <> 0 ORDER BY menu_likes DESC");
		return $hsl;
	}

	function detail_menu($kode)
	{
		$hsl = $this->db->query("SELECT tbl_menu.*,LEFT(menu_harga_lama,2) AS harga_lama,LEFT(menu_harga_baru,2) AS harga_baru FROM tbl_menu where menu_id='$kode'");
		return $hsl;
	}

	function add_like($kode)
	{
		$hsl = $this->db->query("UPDATE tbl_menu SET menu_likes=menu_likes+1 where menu_id='$kode'");
		return $hsl;
	}


	//END MODEL UNTUK MOBILE

}