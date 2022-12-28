<?php

namespace App\Controllers;
// use App\Models\DashboardModel;
class PerhitunganDL extends BaseController
{
	public function __construct(){
		// $this->DashboardModel = new DashboardModel();
		$this->session = \Config\Services::session();
		$this->request = \Config\Services::request();

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
		$data_atribut = $this->DashboardModel->get_data_atribut();
		$data['data_atribut'] = $data_atribut;
		$data['data_count_layak'] = $this->get_count_layak();
		$data['data_count_nolayak'] = $this->get_count_nolayak();
		$data['data_count_total'] = $this->get_count_total();
		return view('dashboard/perhitungan_data_latih', $data);
	}
    
	
	//--------------------------------------------------------------------

}
