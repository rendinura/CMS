<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caraousel extends CI_Controller
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
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();
        $data = array(
            'judul_halaman'  => 'Caraousel',
            'caraousel'       => $caraousel,
        );
        $this->template->load('template_admin', 'Admin/caraousel', $data);
    }


    public function simpan()
    {
        $this->db->from('caraousel');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->result_array();

        $namafoto                      = date('YmdHis') . '.jpg';
        $config['upload_path']         = 'assets/upload/caraousel/';
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
            redirect('admin/caraousel');
        } elseif ($cek <> null) {
            $this->session->set_flashdata('alert', '
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Maap :( caraousel sudah ada...</i>
            </div>
			');
            redirect('admin/caraousel');
        } elseif ($this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }


        $data = array(
            'judul'          => $this->input->post('judul'),
            'foto'           => $namafoto,
        );
        $this->db->insert('caraousel', $data);
        $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Yeay! caraousel berhasil ditambahkan...</i>
            </div>
			');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menambahkan Caraousel',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/caraousel');
    }

    public function hapus($id)
    {
        $filename = FCPATH . '/assets/upload/caraousel/' . $id;
        if (file_exists($filename)) {
            unlink("./assets/upload/caraousel/" . $id);
        }

        $where = array(
            'foto' => $id
        );
        $this->db->delete('caraousel', $where);
        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2">Data berhasil dihapus...</i>
     </div>');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Menghapus Caraousel',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/caraousel');
    }

    public function update()
    {
        $namafoto                      = $this->input->post('nama_foto');
        $config['upload_path']         = 'assets/upload/caraousel/';
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
            redirect('admin/caraousel');
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

        $this->db->update('caraousel', $data, $where);
        $this->session->set_flashdata('alert', '
			<div class="alert alert-success alert-dismissible fade show" role="alert">
               <i class="fa fa-exclamation-circle me-2">Yeay! caraousel berhasil diperbarui...</i>
            </div>
			');
        $username = $this->session->userdata('username');
        $data2 = [
            'username'   => $username,
            'keterangan' => $username . ' Memperbarui Caraousel',
        ];
        $this->db->insert('recent_login', $data2);
        redirect('Admin/caraousel');
    }
}
