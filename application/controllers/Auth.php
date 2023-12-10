<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username', $username, $password);
        $cek = $this->db->get()->row();
        if ($cek == NULL) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2">Maap:( Username salah</i></div>
            ');
            redirect('auth');
        } else if ($password == $cek->password) {
            $data = array(
                'id_user'     => $cek->id_user,
                'nama'        => $cek->nama,
                'username'    => $cek->username,
                'level'       => $cek->level
            );
            $this->session->set_userdata($data);

            $data2 = [
                'username'   => $this->input->post('username'),
                'keterangan' => $this->input->post('username') . ' Melakukan Login',
            ];
            $this->db->insert('recent_login', $data2);

            redirect('Admin/home');
        } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2">Maap :( Password salah</i></div>
            ');
            redirect('auth');
        }
    }

    public function logout()
    {
        $username = $this->session->userdata('username');
        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Anda Berhasil Logout..</i></div>
        ');
        $this->session->sess_destroy();
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Melakukan Logout',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('home');
    }
}
