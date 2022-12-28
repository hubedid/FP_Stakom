<?php

namespace App\Controllers;
use App\Models\DashboardModel;

class DataUji extends BaseController
{
	public function __construct(){
		$this->DashboardModel = new DashboardModel();
		$this->session = \Config\Services::session();
		$this->request = \Config\Services::request();


		// if($this->session->userdata('hak_akses') != '1'){
		// 	$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-danger fade show" role="alert">
		// 			<strong> Login terlebuh dahulu!</strong>
		// 			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		// 			    <span aria-hidden="true">&times;</span>
		// 			  </button>
		// 			</div>');
		// 	redirect('welcome');
		// }
	}

	public function index()
	{

		$id = $this->session->get('id');
		$data_user = $this->DashboardModel->get_data_user($id);
		$data['data_user'] = $data_user;
		$data_uji = $this->DashboardModel->get_data_uji();
		$data['data_uji'] = $data_uji;
		$data['data_perhitungan'] = $this->get_data_perhitungan();
		$data['data_count_layak'] = $this->get_count_layak();
		$data['data_count_nolayak'] = $this->get_count_nolayak();
		$data['data_count_total'] = $this->get_count_total();
		return view('dashboard/data_uji', $data);
	}

	// public function get_data_income_daily(){
	// 	$id = $this->session->get('id');
	// 	$data_income = $this->DashboardModel->get_data_income_daily($id, $this->request->getVar('bulan'), $this->request->getVar('tahun'), $this->request->getVar('minggu'));
	// 	$output = $data_income;

	// 	echo json_encode($output);
	// }
	// public function get_data_latih(){
	// 	$data_latih = $this->DashboardModel->get_data_latih();
	// 	$output = $data_latih;
	// 	echo json_encode($output);
	// }
		public function get_count(){
			// $data_latih = $this->DashboardModel->get_count();
			$data_count = $this->DashboardModel->get_count($this->request->getVar('atribut'), $this->request->getVar('kelas'), $this->request->getVar('kelayakan'));
			$output = $data_count;
			echo json_encode($output);
		}

	//--------------------------------------------------------------------

}
