<?php

namespace App\Controllers;
// use App\Models\DashboardModel;

class Dashboard extends BaseController
{
	public function __construct(){
		// $this->DashboardModel = new DashboardModel();
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
		$data_latih = $this->DashboardModel->get_data_latih();
		$data['data_latih'] = $data_latih;
		$data_kelas = $this->DashboardModel->get_data_kelas();
		$data['data_kelas'] = $data_kelas;
		$data_uji = $this->DashboardModel->get_data_uji();
		$data['data_uji'] = $data_uji;
		$data_atribut = $this->DashboardModel->get_data_atribut();
		$data['data_atribut'] = $data_atribut;
		$data['data_perhitungan'] = $this->get_data_perhitungan();
		$data['data_count_layak'] = $this->get_count_layak();
		$data['data_count_nolayak'] = $this->get_count_nolayak();
		$data['data_count_total'] = $this->get_count_total();
		$data['data_akurasi'] = $this->get_data_akurasi();

		// $data_income = $this->DashboardModel->get_data_income($id, 2022);
		// $data['data_income'] = $data_income;
		// echo json_encode($output);

		return view('dashboard/dashboard', $data);
		// echo "tes";
	}

	// public function get_data_income(){
	// 	$id = $this->session->get('id');
	// 	$data_income = $this->DashboardModel->get_data_income($id, $this->request->getVar('tahun'));
	// 	$output = $data_income;

	// 	echo json_encode($output);
	// }

	//--------------------------------------------------------------------

}
