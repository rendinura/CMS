<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
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
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Konfigurasi',
            'konfig'        => $konfig
        );
        $this->template->load('template_admin', 'Admin/konfigurasi', $data);
    }

    public function update()
    {
        $where = array('id_konfigurasi' => 1);
        $data = array(
            'judul_website'      => $this->input->post('judul_website'),
            'profile_website'    => $this->input->post('profile_website'),
            'instagram'          => $this->input->post('instagram'),
            'facebook'           => $this->input->post('facebook'),
            'email'              => $this->input->post('email'),
            'alamat'             => $this->input->post('alamat'),
            'no_wa'              => $this->input->post('no_wa'),
            'marquee'              => $this->input->post('marquee')
        );
        $this->db->update('Konfigurasi', $data, $where);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Yeayy data Konfigurasi berhasil diperbarui</i>
     </div>');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Memperbarui Konfigurasi',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/Konfigurasi');
    }
}
