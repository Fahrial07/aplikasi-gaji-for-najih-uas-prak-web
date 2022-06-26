<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_welcome');
	}


	public function index()
	{
		$data = array(
			'data'	=> $this->M_welcome->tampil_data()
		);
		$this->load->view('welcome_message', $data);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$lama_kerja = $this->input->post('lama_kerja');
		$bonus = $this->input->post('bonus');
		$bulan = $this->input->post('bulan');
		$bon =  $this->input->post('bon');

		if ($lama_kerja == 1) {
			$gaji = 1000000;
		} else if ($lama_kerja < 3) {
			$gaji = 1500000;
		} else if ($lama_kerja == 3 || $lama_kerja < 5) {
			$gaji = 2000000;
		} else if ($lama_kerja == 5 || $lama_kerja < 10) {
			$gaji = 3000000;
		} else if ($lama_kerja >= 10) {
			$gaji = 4000000;
		}

		$data = array(
			'nama' => $nama,
			'lama_kerja' => $lama_kerja,
			'gaji' => $gaji,
			'bonus' => $bonus,
			'bon'	=> $bon,
			'bulan' => $bulan
		);

		$this->M_welcome->input($data);

		redirect('/');
	}

	public function update($id)
	{

		$nama = $this->input->post('nama');
		$lama_kerja = $this->input->post('lama_kerja');
		$bonus = $this->input->post('bonus');
		$bulan = $this->input->post('bulan');
		$bon =  $this->input->post('bon');

		if ($lama_kerja == 1) {
			$gaji = 1000000;
		} else if ($lama_kerja < 3) {
			$gaji = 1500000;
		} else if ($lama_kerja == 3 || $lama_kerja < 5) {
			$gaji = 2000000;
		} else if ($lama_kerja == 5 || $lama_kerja < 10) {
			$gaji = 3000000;
		} else if ($lama_kerja >= 10) {
			$gaji = 4000000;
		}

		$data = array(
			'nama' => $nama,
			'lama_kerja' => $lama_kerja,
			'gaji' => $gaji,
			'bonus' => $bonus,
			'bon'	=> $bon,
			'bulan' => $bulan
		);

		$this->M_welcome->update($id, $data);

		redirect('/');
	}

	public function hapus($id)
	{
		$this->M_welcome->hapus($id);

		redirect('/');
	}
}
