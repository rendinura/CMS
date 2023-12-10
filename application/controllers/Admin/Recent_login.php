<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recent_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') <> 'Admin') {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->db->from('recent_login');
        $this->db->order_by('tanggal', 'DESC');
        $recent = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Aktifitas User',
            'recent_login'          => $recent,
        );
        $this->template->load('template_admin', 'Admin/recent_login', $data);
    }

    public function hapus($id)
    {
        $where = array(
            'id_recent_login' => $id
        );
        $this->db->Delete('recent_login', $where);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Data berhasil dihapus...</i>
     </div>');
        redirect('Admin/recent_login');
    }

    public function hapusall()
    {
        $this->db->empty_table('recent_login');
        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <i class="fa fa-exclamation-circle me-2">semua data berhasil dihapus...</i>
        </div>
        ');
        redirect('Admin/recent_login');
    }
}
