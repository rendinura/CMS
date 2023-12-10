<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if ($this->session->userdata('level') <> 'Admin') {
            redirect('auth');
        }
    }

    public function index()
    {
        $this->db->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Data Pengguna',
            'user'          => $user
        );
        $this->template->load('template_admin', 'Admin/user', $data);
    }


    public function simpan()
    {
        $username = $this->input->post('username');
        $this->db->from('user')->where('username', $username);
        $cek = $this->db->count_all_results();
        if ($cek == 1) {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maap:( username sudah digunakan...</i>
            </div>
			');
        } else {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Yeay! Data berhasil ditambahkan...</i>
            </div>
			');
            $this->User_model->simpan();
        }
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menambahkan User',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/user');
    }

    public function hapus($id)
    {
        $this->User_model->hapus($id);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Data berhasil dihapus...</i>
     </div>');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menghapus User',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/user');
    }

    public function update()
    {
        $this->User_model->update($id_user);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Yeayy Data berhasil perbarui</i>
     </div>');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Memperbarui User',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/user');
    }
}
