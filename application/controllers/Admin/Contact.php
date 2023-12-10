<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->db->from('saran');
        $this->db->order_by('id_saran', 'DESC');
        $saran = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Kritik dan Saran',
            'saran'         =>  $saran,
        );
        $this->template->load('template_admin', 'Admin/contact', $data);
    }

    public function hapus($id)
    {
        $where = array(
            'id_saran' => $id
        );
        $this->db->Delete('saran', $where);

        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <i class="fa fa-exclamation-circle me-2">pesan berhasil dihapus...</i>
        </div>
        ');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menghapus Kritik dan Saran',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/contact');
    }

    public function hapusall()
    {
        $this->db->empty_table('saran');
        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <i class="fa fa-exclamation-circle me-2">pesan berhasil dihapus...</i>
        </div>
        ');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menghapus Semua Kritik dan Saran',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/contact');
    }
}
