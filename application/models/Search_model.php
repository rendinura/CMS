<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Search_model extends CI_Model
{
    public function search($keyword)
    {
        $this->db->like('judul', $keyword);
        $this->db->or_like('keterangan', $keyword);
        $this->db->or_like('foto', $keyword);
        $this->db->or_like('slug', $keyword);
        $this->db->or_like('tanggal', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('id_kategori', $keyword);

        return $this->db->get('konten')->result();
    }
}
