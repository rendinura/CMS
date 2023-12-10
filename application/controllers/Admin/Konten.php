<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konten extends CI_Controller
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
        // $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('user c', 'a.username=c.username', 'left');
        $this->db->order_by('id_konten', 'DESC');
        $konten = $this->db->get()->result_array();

        $data = array(
            'judul_halaman'  => 'Konten',
            'kategori'       => $kategori,
            'konten'         => $konten
        );
        $this->template->load('template_admin', 'Admin/konten', $data);
    }


    public function simpan()
    {
        $this->db->from('konten');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();

        $namafoto                      = date('YmdHis') . '.jpg';
        $config['upload_path']         = 'assets/upload/konten/';
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
            redirect('Admin/konten');
        } elseif ($cek <> null) {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maap :( Konten sudah ada...</i>
            </div>
			');
            redirect('Admin/konten');
        } elseif ($this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }



        $data = array(
            'judul'          => $this->input->post('judul'),
            'id_kategori'    => $this->input->post('id_kategori'),
            'keterangan'     => $this->input->post('keterangan'),
            'foto'           => $namafoto,
            'tanggal'        => date('Y-m-d'),
            'username'       => $this->session->userdata('username'),
            'slug'           => str_replace(' ', '-', $this->input->post('judul'))
        );
        $this->db->insert('konten', $data);
        $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Yeay! Konten berhasil ditambahkan...</i>
            </div>
			');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menambahkan Konten',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/konten');
    }

    public function hapus($id)
    {
        $filename = FCPATH . '/assets/upload/konten/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/konten/" . $id);
        }

        $where = array(
            'foto' => $id
        );
        $this->db->delete('konten', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Data berhasil dihapus...</i>
     </div>');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menghapus Konten',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/konten');
    }

    public function update()
    {
        $namafoto                      = $this->input->post('nama_foto');
        $config['upload_path']         = 'assets/upload/konten/';
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
            redirect('Admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $data = array(
            'judul'          => $this->input->post('judul'),
            'id_kategori'    => $this->input->post('id_kategori'),
            'keterangan'     => $this->input->post('keterangan'),
            'slug'           => str_replace(' ', '-', $this->input->post('judul'))
        );

        $where = array(
            'foto'       => $this->input->post('nama_foto')
        );

        $this->db->update('konten', $data, $where);
        $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Yeay! Konten berhasil diperbarui...</i>
            </div>
			');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Memperbarui Konten',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/konten');
    }
}
