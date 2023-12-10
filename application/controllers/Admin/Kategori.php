<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Kategori Konten',
            'kategori'          => $kategori
        );
        $this->template->load('template_admin', 'Admin/kategori', $data);
    }


    public function simpan()
    {
        $namaKategori = $this->input->post('nama_kategori');
        $this->db->from('kategori')->where('nama_kategori', $namaKategori);
        $cek = $this->db->get()->result_array();
        if ($cek <> NULL) {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maap :( Kategori konten sudah ada...</i>
            </div>
			');
            redirect('Admin/kategori');
        } else {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Yeay! Kategori berhasil ditambahkan...</i>
            </div>
			');
            $data = array(
                'nama_kategori'  => $this->input->post('nama_kategori')
            );
            $this->db->insert('kategori', $data);
        }
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menambahkan Kategori',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/kategori');
    }

    public function hapus($id)
    {
        $where = array(
            'id_kategori' => $id
        );
        $this->db->delete('kategori', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Data berhasil dihapus...</i>
     </div>');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menghapus Kategori',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/kategori');
    }

    public function update()
    {
        $where = array('id_kategori' => $this->input->post('id_kategori'));
        $data = array('nama_kategori' => $this->input->post('nama_kategori'));
        $this->db->update('kategori', $data, $where);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Yeayy Kategori berhasil diperbarui</i>
     </div>');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Memperbarui Kategori',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/kategori');
    }
}
