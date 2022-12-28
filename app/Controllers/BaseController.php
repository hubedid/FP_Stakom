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

	public function get_data_akurasi(){
		$data_uji = $this->DashboardModel->get_data_uji();
		$total = 0;
		$data = array();
		$salah = 0;
		$benar = 0;
		$data_count_layak = $this->get_count_layak();
		$data_count_nolayak = $this->get_count_nolayak();
		$data_perhitungan = $this->get_data_perhitungan();
		$data_count_total = $this->get_count_total();
		foreach($data_uji as $latih){
			$lantai = $latih->jenis_lantai;
			$dinding = $latih->jenis_dinding;
			$penerangan = $latih->penerangan;
			$pekerjaan = $latih->pekerjaan_kepala_rumah_tangga;
			$penghasilan = $latih->jumlah_penghasilan;
			$aset = $latih->kepemilikan_aset;
			$prob_layak = $data_perhitungan[0]->$lantai->layak * $data_perhitungan[1]->$dinding->layak * $data_perhitungan[2]->$penerangan->layak * $data_perhitungan[3]->$pekerjaan->layak * $data_perhitungan[4]->$penghasilan->layak * $data_perhitungan[5]->$aset->layak * ($data_count_layak[6]->total / $data_count_total[6]->total);
			$prob_nolayak = $data_perhitungan[0]->$lantai->nolayak * $data_perhitungan[1]->$dinding->nolayak * $data_perhitungan[2]->$penerangan->nolayak * $data_perhitungan[3]->$pekerjaan->nolayak * $data_perhitungan[4]->$penghasilan->nolayak * $data_perhitungan[5]->$aset->nolayak * ($data_count_nolayak[6]->total / $data_count_total[6]->total);
			// 	$data[] = new stdClass;
			// 	$i++;
			// $nama_kelas = $kelas->nama_kelas;
			// $data_count = (object)['layak' => ((int)$layak[$i]->$nama_kelas + 1)/((int)$layak[6]->total + (new \ArrayIterator($layak[$i]))->count()), 'nolayak' => ((int)$nolayak[$i]->$nama_kelas + 1)/((int)$nolayak[6]->total + (new \ArrayIterator($nolayak[$i]))->count())];
			// $temp = $kelas->nama_atribut;
			// $data[$i]->$nama_kelas = $data_count;
			((((($prob_layak > $prob_nolayak) ? "Layak" : "Tidak Layak") == $latih->kelayakan) ? "Benar" : "Salah") == "Benar") ? $benar++ : $salah++;
			
		}
		$data[] = new stdClass;
		$data[0]->benar = $benar;
		$data[0]->salah = $salah;
		$akurasi = round((($benar/($benar + $salah)) * 100), 2) . '%';
		$data[0]->akurasi = $akurasi;
		// echo json_encode($data);
		return $data;
	}
}
