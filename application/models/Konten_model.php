<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten_model extends CI_Model
{
    public function get_data($limit, $start)
    {
        // $this->db->limit($limit, $start);
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('id_konten', 'DESC');
        $query = $this->db->get('', $limit, $start);
        return $query->result_array();
    }

    public function count_data()
    {
        $this->db->order_by('id_konten', 'DESC');
        return $this->db->count_all('konten');
    }

    public function konten_limit()
    {
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori');
        $this->db->join('user c', 'a.username=c.username');
        $this->db->order_by('id_konten', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result_array();
    }
}
