<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Konten_model');
	}

	public function index()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->join('user c', 'a.username=c.username', 'left');
		$this->db->order_by('id_konten', 'DESC');
		$konten = $this->db->get()->result_array();

		$data = array(
			'judul'        => "Beranda | Kak Kecup",
			'konfig'       => $konfig,
			'caraousel'    => $caraousel,
			'kategori'     => $kategori,
			'konten'       => $konten,
			'konten2'      => $this->Konten_model->konten_limit(),
		);

		$config['base_url'] = base_url('Home/index');
		$config['total_rows'] = $this->Konten_model->count_data();
		$config['per_page'] = 4;
		$config['uri_segment'] = 3; // Segment URL yang digunakan untuk menentukan nomor halaman

		$this->pagination->initialize($config);

		$page['page'] = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		$data['results'] = $this->Konten_model->get_data($config['per_page'], $page['page']);
		$data['pagination'] = $this->pagination->create_links();

		// $this->load->view('User/beranda', $data);
		$this->template->load('template_user', 'User/beranda', $data);
	}

	public function kategori($id)
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->join('user c', 'a.username=c.username', 'left');
		$this->db->where('a.id_kategori', $id);
		$konten = $this->db->get()->result_array();


		$this->db->from('kategori')->where('id_kategori', $id);
		$nama_kategori = $this->db->get()->row()->nama_kategori;
		$data = array(
			'judul'           => $nama_kategori . " | Kak Kecup",
			'nama_kategori'   => $nama_kategori,
			'konfig'          => $konfig,
			'kategori'        => $kategori,
			'konten'          => $konten,
			'konten2'      => $this->Konten_model->konten_limit(),
		);
		// $this->load->view('User/kategori', $data);
		$this->template->load('template_user', 'User/kategori', $data);
	}

	public function artikel($id)
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->join('user c', 'a.username=c.username', 'left');
		$this->db->where('slug', $id);
		$konten = $this->db->get()->row();


		$data = array(
			'judul'        => $konten->judul . " | Kak Kecup",
			'konfig'       => $konfig,
			'kategori'     => $kategori,
			'konten'       => $konten,
			'konten2'      => $this->Konten_model->konten_limit(),
		);
		// $this->load->view('User/detail', $data);
		$this->template->load('template_user', 'User/detail', $data);
	}

	public function hasil_pencarian()
	{
		$this->load->model('Search_model');

		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('caraousel');
		$caraousel = $this->db->get()->result_array();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten a');
		$this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		$this->db->join('user c', 'a.username=c.username', 'left');
		$this->db->order_by('tanggal', 'DESC');
		$konten = $this->db->get()->result_array();
		$data = array(
			'judul'        => "Beranda | Kak Kecup",
			'konfig'       => $konfig,
			'caraousel'    => $caraousel,
			'kategori'     => $kategori,
			'konten'       => $konten,
			'konten2'      => $this->Konten_model->konten_limit(),
		);

		// $config['base_url'] = base_url('Home/hasil_pencarian');
		// $config['total_rows'] = $this->Konten_model->count_data();
		// $config['per_page'] = 3;
		// $config['uri_segment'] = 3; // Segment URL yang digunakan untuk menentukan nomor halaman

		// $this->pagination->initialize($config);

		// $page['page'] = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		// $data['results'] = $this->Konten_model->get_data($config['per_page'], $page['page']);
		// $data['pagination'] = $this->pagination->create_links();

		$data['keyword'] = $this->input->post('keyword');

		$keyword = $this->input->post('keyword');
		$data['results'] = $this->Search_model->search($keyword);
		// $this->load->view('User/search', $data);
		$this->template->load('template_user', 'User/search', $data);
	}

	public function galeri()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		// $this->db->from('konten a');
		// $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
		// $this->db->join('user c', 'a.username=c.username', 'left');
		// $konten = $this->db->get()->row();

		$this->db->from('galeri');
		$galeri = $this->db->get()->result_array();

		$data = array(
			'judul'        => "Galeri | Kak Kecup",
			'konfig'       => $konfig,
			'kategori'     => $kategori,
			'galeri'       => $galeri,
			'konten2'      => $this->Konten_model->konten_limit(),
		);
		// $this->load->view('User/galeri', $data);
		$this->template->load('template_user', 'User/galeri', $data);
	}

	public function contact()
	{
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('galeri');
		$galeri = $this->db->get()->result_array();

		$data = array(
			'judul'        => "Kritik | Saran",
			'konfig'       => $konfig,
			'kategori'     => $kategori,
			'galeri'       => $galeri,
			'konten2'      => $this->Konten_model->konten_limit(),
		);
		// $this->load->view('User/contact', $data);
		$this->template->load('template_user', 'User/contact', $data);
	}

	public function pesan()
	{
		$this->db->from('saran');
		$data = array(
			'saran'          => $this->input->post('saran'),
			'tanggal'        => date('Y-m-d'),
			'nama'           => $this->input->post('nama'),
			'email'           => $this->input->post('email'),
		);
		$this->db->insert('saran', $data);
		$this->session->set_flashdata('alert', '
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				   <i class="fa fa-exclamation-circle me-2">Yeay! pesan berhasil terkirim...</i>
				</div>
				');
		redirect('Home/contact');
	}
}
