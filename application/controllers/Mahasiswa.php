<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');
class Mahasiswa extends CI_Controller{//membuat controller mahasiswa
	function __construct(){
		parent:: __construct();
		$this->load->model('Mahasiswa_model');//load file bernama mahasiswa_model dari model
	}
	
	public function index(){
			$data['user'] = $this->Mahasiswa_model->getAll()->result();
			$this->template->views('crud/home_mahasiswa',$data);
	}

	public function tambah() {//membuat function tambah
		$this->template->views('crud/tambah_mahasiswa');
	}

	public function input() {//membuat fucntion input untuk menginput data ke db
		//membuat beberapa variable untuk input
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$grup = $this->input->post('grup');

		$data = array(//membuat array untuk menampung data yang telah diinput
			'username' => $username,
			'password' => $password,
			'nama' => $nama,
			'grup' => $grup
		);
		$this->Mahasiswa_model->input_data($data, 'user');//mengakses mahasiswa_model dan data yang ada pada table user
		redirect('Mahasiswa/index');//setelah data berhasil disimpan, maka kembalikan ke index
	}
}
?>