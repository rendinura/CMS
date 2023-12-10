<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
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
        $this->db->from('galeri');
        $galeri = $this->db->get()->result_array();
        $data = array(
            'judul_halaman'  => 'galeri',
            'galeri'       => $galeri,
        );
        $this->template->load('template_admin', 'Admin/galeri', $data);
    }

    public function simpan()
    {
        $this->db->from('galeri');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();

        $namafoto                      = date('YmdHis') . '.jpg';
        $config['upload_path']         = 'assets/upload/galeri/';
        $config['max_size']            = 2048 * 1024; //3*1024*1024; // 3MB; 0=unlimited
        $config['file_name']           = $namafoto;
        $config['allowed_types']       = '*';
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size']   >= 2048 * 1024) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maap :( Ukuran foto terlalu besar, Harap upload ulang foto yang kurang dari 500 KB.</i>
            </div>
            ');
            redirect('Admin/galeri');
        } elseif ($cek <> null) {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maap :( galeri sudah ada...</i>
            </div>
			');
            redirect('Admin/galeri');
        } elseif ($this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }


        $data = array(
            'judul'          => $this->input->post('judul'),
            'foto'           => $namafoto,
            'tanggal'        => date('Y-m-d'),
        );
        $this->db->insert('galeri', $data);
        $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Yeay! galeri berhasil ditambahkan...</i>
            </div>
			');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menambahkan Foto Galeri',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/galeri');
    }

    public function hapus($id)
    {
        $filename = FCPATH . '/assets/upload/galeri/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/galeri/" . $id);
        }

        $where = array(
            'foto' => $id
        );
        $this->db->delete('galeri', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Data berhasil dihapus...</i>
        </div>');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menghapus Foto Galeri',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/galeri');
    }

    public function update()
    {
        $namafoto                      = $this->input->post('nama_foto');
        $config['upload_path']         = 'assets/upload/galeri/';
        $config['max_size']            = 2048 * 1024; //3*1024*1024; // 3MB; 0=unlimited
        $config['file_name']           = $namafoto;
        $config['overwrite']           = true;
        $config['allowed_types']       = '*';
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size']   >= 2048 * 1024) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maap :( Ukuran foto terlalu besar, Harap upload ulang foto yang kurang dari 500 KB.</i>
            </div>
            ');
            redirect('Admin/galeri');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $data = array(
            'judul'          => $this->input->post('judul'),
            'foto'           => $namafoto
        );

        $where = array(
            'foto'       => $this->input->post('nama_foto')
        );

        $this->db->update('galeri', $data, $where);
        $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Yeay! galeri berhasil diperbarui...</i>
            </div>
			');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Memperbarui Foto Galeri',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/galeri');
    }
}
