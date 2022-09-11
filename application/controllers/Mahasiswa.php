<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('Mahasiswa_model');
	}

	public function index() {
		$this->data['title'] = 'Mahasiswa';
		$this->data['mahasiswa'] = $this->Mahasiswa_model->getDataMahasiswa();

		$this->load->view('mahasiswa/mahasiswa_list', $this->data);
	}

	public function add() {
		$this->data['title'] = "Tambah Mahasiswa";
		$this->load->view('mahasiswa/mahasiswa_add', $this->data);
	}

	public function add_save() {
		$nama 			= $this->input->post('nama_mahasiswa');
		$nim 			= $this->input->post('nim');
		$no_hp 			= $this->input->post('no_hp');
		$email 			= $this->input->post('email');
		$jurusan 		= $this->input->post('jurusan');
		$foto_profil 	= $_FILES['foto_profile'];
		$alamat 		= $this->input->post('alamat');

		if ($foto_profil = '') {
		} else {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto_profile')) {
				echo "Upload Gagal";
				die();
			} else {
				$foto_profil = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama' 			=> $nama,
			'nim' 			=> $nim,
			'no_hp' 		=> $no_hp,
			'email' 		=> $email,
			'jurusan' 		=> $jurusan,
			'foto_profil' 	=> $foto_profil,
			'alamat' 		=> $alamat,
		);

		$simpan = $this->Mahasiswa_model->simpan_data($data);

		if($simpan) {
			redirect("mahasiswa");
		}
	}
	
	public function edit($id) {
		$this->data['title'] = 'Edit Mahasiswa';
		$this->data['mahasiswa'] = $this->Mahasiswa_model->find($id);

		$this->load->view('mahasiswa/mahasiswa_edit',$this->data);
	}

	public function edit_save() {
		$id = $this->input->post('id_mhs');
		$nama 			= $this->input->post('nama_mahasiswa');
		$nim 			= $this->input->post('nim');
		$no_hp 			= $this->input->post('no_hp');
		$email 			= $this->input->post('email');
		$jurusan 		= $this->input->post('jurusan');
		$foto_profil 	= $_FILES['foto_profile'];
		$alamat 		= $this->input->post('alamat');

		if ($foto_profil = '') {
		} else {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto_profile')) {
				echo "Upload Gagal";
				die();
			} else {
				$foto_profil = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama' 			=> $nama,
			'nim' 			=> $nim,
			'no_hp' 		=> $no_hp,
			'email' 		=> $email,
			'jurusan' 		=> $jurusan,
			'foto_profil' 	=> $foto_profil,
			'alamat' 		=> $alamat,
		);

		$edit = $this->Mahasiswa_model->edit_Data($data,$id);
		if($edit){
			redirect('mahasiswa');
		}
	}
	
	public function hapus($id) {
		$del = $this->Mahasiswa_model->delete($id);
		if($del){
			redirect('mahasiswa');
		}
	}
}
?>
