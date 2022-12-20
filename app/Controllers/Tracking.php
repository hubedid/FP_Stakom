<?php

namespace App\Controllers;
use App\Models\DashboardModel;

class Tracking extends BaseController
{
	public function __construct(){
		$this->DashboardModel = new DashboardModel();
		$this->session = \Config\Services::session();
		$this->request = \Config\Services::request();
		// Nambah model
		// $this->load->model('realisasirkapdesainpabrik_model');
		// Nambah model


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

		// $data_income = $this->DashboardModel->get_data_income($id, 2022);
		// $data['data_income'] = $data_income;
		// echo json_encode($output);
        

		return view('dashboard/tracking', $data);
		// echo "tes";
	}

	// public function get_data_income_daily(){
	// 	$id = $this->session->get('id');
	// 	$data_income = $this->DashboardModel->get_data_income_daily($id, $this->request->getVar('bulan'), $this->request->getVar('tahun'), $this->request->getVar('minggu'));
	// 	$output = $data_income;

	// 	echo json_encode($output);
	// }

	//--------------------------------------------------------------------

}
