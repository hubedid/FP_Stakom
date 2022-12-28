<?php

namespace App\Controllers;
use App\Models\DashboardModel;
use \stdClass;
/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		$this->DashboardModel = new DashboardModel();
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

	public function get_count_layak(){
		$data_kelas = $this->DashboardModel->get_data_kelas();
		$total = 0;
		$data = array();
		$temp = " ";
		$i = -1;
		foreach($data_kelas as $kelas){
			if($temp != $kelas->nama_atribut){
				$data[] = new stdClass;
				$i++;
			}
			$data_count = $this->DashboardModel->get_count($kelas->atribut_sql, $kelas->nama_kelas, "Layak");
			$nama_kelas = $kelas->nama_kelas;
			$temp = $kelas->nama_atribut;
			$data[$i]->$nama_kelas = $data_count;
			$total += $data_count;
			
		}
		$data[] = new stdClass;
		$data[$i+1]->total = $total/6;
		// echo json_encode($data);
		return $data;
	}
	public function get_count_nolayak(){
		$data_kelas = $this->DashboardModel->get_data_kelas();
		$total = 0;
		$data = array();
		$temp = " ";
		$i = -1;
		foreach($data_kelas as $kelas){
			if($temp != $kelas->nama_atribut){
				$data[] = new stdClass;
				$i++;
			}
			$data_count = $this->DashboardModel->get_count($kelas->atribut_sql, $kelas->nama_kelas, "Tidak Layak");
			$nama_kelas = $kelas->nama_kelas;
			$temp = $kelas->nama_atribut;
			$data[$i]->$nama_kelas = $data_count;
			$total += $data_count;
			
		}
		$data[] = new stdClass;
		$data[$i+1]->total = $total/6;
		// echo json_encode($data);
		return $data;
	}
	public function get_count_total(){
		$data_kelas = $this->DashboardModel->get_data_kelas();
		$total = 0;
		$data = array();
		$temp = " ";
		$i = -1;
		$layak = $this->get_count_layak();
		$nolayak = $this->get_count_nolayak();
		foreach($data_kelas as $kelas){
			if($temp != $kelas->nama_atribut){
				$data[] = new stdClass;
				$i++;
			}
			$nama_kelas = $kelas->nama_kelas;
			$data_count = (int)$layak[$i]->$nama_kelas + (int)$nolayak[$i]->$nama_kelas;
			$temp = $kelas->nama_atribut;
			$data[$i]->$nama_kelas = $data_count;
			$total += $data_count;
			
		}
		$data[] = new stdClass;
		$data[$i+1]->total = $total/6;
		// echo json_encode($data);
		return $data;
	}
	// public function get_perhitungan(){
	// 	$data_kelas = $this->DashboardModel->get_data_kelas();
	// 	$data = array();
	// 	$layak = $this->get_count_layak();
	// 	$nolayak = $this->get_count_nolayak();
	// 	$i = -1;
	// 	$j = 0;
	// 	$temp = " ";
	// 	foreach($data_kelas as $kelas){
	// 		if($temp != $kelas->nama_atribut)$i++;
	// 		$nama_kelas = $kelas->nama_kelas;
	// 		$data[] = new stdClass;
	// 		$data[$j]->layak = (object)['hoaks' => ((int)$layak[$i]->$nama_kelas + 1)/((int)$layak[6]->total + (new \ArrayIterator($layak[$i]))->count()), 'ngerong' => "hoaks"];
	// 		// $data[$j]->layak[] = new stdClass;
	// 		$data[$j]->nolayak = ((int)$nolayak[$i]->$nama_kelas + 1)/((int)$nolayak[6]->total + (new \ArrayIterator($nolayak[$i]))->count());
	// 		$temp = $kelas->nama_atribut;
	// 		$j++;
			
			
	// 	}
	// 	echo json_encode($data);
	// 	return $data;
	// }
	public function get_data_perhitungan(){
		$data_kelas = $this->DashboardModel->get_data_kelas();
		$total = 0;
		$data = array();
		$temp = " ";
		$i = -1;
		$layak = $this->get_count_layak();
		$nolayak = $this->get_count_nolayak();
		foreach($data_kelas as $kelas){
			if($temp != $kelas->nama_atribut){
				$data[] = new stdClass;
				$i++;
			}
			$nama_kelas = $kelas->nama_kelas;
			$data_count = (object)['layak' => ((int)$layak[$i]->$nama_kelas + 1)/((int)$layak[6]->total + (new \ArrayIterator($layak[$i]))->count()), 'nolayak' => ((int)$nolayak[$i]->$nama_kelas + 1)/((int)$nolayak[6]->total + (new \ArrayIterator($nolayak[$i]))->count())];
			$temp = $kelas->nama_atribut;
			$data[$i]->$nama_kelas = $data_count;
			
		}
		// echo json_encode($data);
		return $data;
	}
}
