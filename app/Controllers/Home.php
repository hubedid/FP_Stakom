<?php

namespace App\Controllers;
// use App\Models\DashboardModel;

class Home extends BaseController
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

		return view('home/home', $data);
		// echo "tes";
	}

	// public function get_data_income(){
	// 	$id = $this->session->get('id');
	// 	$data_income = $this->DashboardModel->get_data_income($id, $this->request->getVar('tahun'));
	// 	$output = $data_income;

	// 	echo json_encode($output);
	// }

	//--------------------------------------------------------------------
	public function get_hasil()
    {
		$nama = $this->request->getVar('nama');
		$lantai = $this->request->getVar('jenis_lantai');
		$dinding = $this->request->getVar('jenis_dinding');
		$penerangan = $this->request->getVar('penerangan');
		$pekerjaan = $this->request->getVar('pekerjaan_kepala_rumah_tangga');
		$penghasilan = $this->request->getVar('jumlah_penghasilan');
		$aset = $this->request->getVar('kepemilikan_aset');
		$data_count_layak = $this->get_count_layak();
		$data_count_nolayak = $this->get_count_nolayak();
		$data_perhitungan = $this->get_data_perhitungan();
		$data_count_total = $this->get_count_total();

        if ($nama != null) {
			$prob_layak = $data_perhitungan[0]->$lantai->layak * $data_perhitungan[1]->$dinding->layak * $data_perhitungan[2]->$penerangan->layak * $data_perhitungan[3]->$pekerjaan->layak * $data_perhitungan[4]->$penghasilan->layak * $data_perhitungan[5]->$aset->layak * ($data_count_layak[6]->total / $data_count_total[6]->total);
			$prob_nolayak = $data_perhitungan[0]->$lantai->nolayak * $data_perhitungan[1]->$dinding->nolayak * $data_perhitungan[2]->$penerangan->nolayak * $data_perhitungan[3]->$pekerjaan->nolayak * $data_perhitungan[4]->$penghasilan->nolayak * $data_perhitungan[5]->$aset->nolayak * ($data_count_nolayak[6]->total / $data_count_total[6]->total);
			if($prob_layak > $prob_nolayak){
				$kelayakan = "Layak";
			}else{
				$kelayakan = "Tidak Layak";
			}
            // $pass = $data['password'];
            // $verify_pass = password_verify($password, $pass);
			$this->session->setFlashdata(
                'msg',
                $this->hasil(
                    $nama, $lantai, $dinding, $penerangan, $pekerjaan, $penghasilan, $aset, $kelayakan
                )
            );
			return redirect()->to('/');
        } else {
            $this->session->setFlashdata(
                'msg',
                $this->errors(
                    'Nama Kosong'
                )
            );
            return redirect()->to('/');
        }
    }

	public function hasil($nama, $lantai, $dinding, $penerangan, $pekerjaan, $penghasilan, $aset, $kelayakan)
    {
        $data = 
		'<div class="portfolio-modal modal fade" id="modalHasil" tabindex="-1" aria-labelledby="modalHasil" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0 text-center">Hasil</h2>
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <form action="' . base_url("Home/get_analisis") .'" method="post">
                                        <div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Nama</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="nama" aria-describedby="emailHelp" readonly value="'. $nama . '">
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="lantai" class="col-lg-5 col-form-label col-form-label-lg" >Jenis Lantai Rumah</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="jenis_lantai" aria-describedby="emailHelp" readonly value="'. $lantai . '">
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="dinding" class="col-lg-5 col-form-label col-form-label-lg" >Jenis Dinding Rumah</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="jenis_dinding" aria-describedby="emailHelp" readonly value="'. $dinding . '">
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Penerangan Yang Digunakan</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="penerangan" aria-describedby="emailHelp" readonly value="'. $penerangan . '">
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Pekerjaan Kepala Rumah Tangga</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="pekerjaan_kepala_rumah_tangga" aria-describedby="emailHelp" readonly value="'. $pekerjaan . '">
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Jumlah Penghasilan</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="jumlah_penghasilan" aria-describedby="emailHelp" readonly value="'. $penghasilan . '">
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Kepemilikan Aset</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="kepemilikan_aset" aria-describedby="emailHelp" readonly value="'. $aset . '">
                                            </div>   
                                        </div>
										<div class="py-4 form-group">
                                            <h1 class="portfolio-modal-title text-secondary text-uppercase mb-0 text-center" >'. $kelayakan .'</h1>
                                        </div>
										<div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-lg ">Cek Hasil Analisis</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>'
		;
        return $data;
    }

	public function get_analisis()
    {
		$nama = $this->request->getVar('nama');
		$lantai = $this->request->getVar('jenis_lantai');
		$dinding = $this->request->getVar('jenis_dinding');
		$penerangan = $this->request->getVar('penerangan');
		$pekerjaan = $this->request->getVar('pekerjaan_kepala_rumah_tangga');
		$penghasilan = $this->request->getVar('jumlah_penghasilan');
		$aset = $this->request->getVar('kepemilikan_aset');
		$data_count_layak = $this->get_count_layak();
		$data_count_nolayak = $this->get_count_nolayak();
		$data_perhitungan = $this->get_data_perhitungan();
		$data_count_total = $this->get_count_total();

        if ($nama != null) {
			$prob_layak = $data_perhitungan[0]->$lantai->layak * $data_perhitungan[1]->$dinding->layak * $data_perhitungan[2]->$penerangan->layak * $data_perhitungan[3]->$pekerjaan->layak * $data_perhitungan[4]->$penghasilan->layak * $data_perhitungan[5]->$aset->layak * ($data_count_layak[6]->total / $data_count_total[6]->total);
			$prob_nolayak = $data_perhitungan[0]->$lantai->nolayak * $data_perhitungan[1]->$dinding->nolayak * $data_perhitungan[2]->$penerangan->nolayak * $data_perhitungan[3]->$pekerjaan->nolayak * $data_perhitungan[4]->$penghasilan->nolayak * $data_perhitungan[5]->$aset->nolayak * ($data_count_nolayak[6]->total / $data_count_total[6]->total);
			if($prob_layak > $prob_nolayak){
				$kelayakan = "Layak";
			}else{
				$kelayakan = "Tidak Layak";
			}
			$this->session->setFlashdata(
                'msg',
                $this->analisis(
                    $nama, $lantai, $dinding, $penerangan, $pekerjaan, $penghasilan, $aset, $kelayakan
                )
            );
			return redirect()->to('/');
        } else {
            $this->session->setFlashdata(
                'msg',
                $this->errors(
                    'Nama Kosong'
                )
            );
            return redirect()->to('/');
        }
    }

	public function analisis($nama, $lantai, $dinding, $penerangan, $pekerjaan, $penghasilan, $aset, $kelayakan)
    {
		$data_count_layak = $this->get_count_layak();
		$data_count_nolayak = $this->get_count_nolayak();
		$data_perhitungan = $this->get_data_perhitungan();
		$data_count_total = $this->get_count_total();
		$status = ($kelayakan == "Layak") ? "P (X | Layak) > P (X | Tidak Layak)" : "P (X | Layak) < P (X | Tidak Layak)";
        $data = 
		'<div class="portfolio-modal modal fade" id="modalAnalisis" tabindex="-1" aria-labelledby="modalAnalisis" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0 text-center">Analisis '. $nama . '</h2>
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <form>
                                        <div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg font-weight-bold text-center" >Atribut</label>
											<label for="nama" class="col-lg-3 col-form-label col-form-label-lg font-weight-bold text-center" >Kelas</label>
											<label for="nama" class="col-lg-2 col-form-label col-form-label-lg font-weight-bold text-center" >Layak</label>
											<label for="nama" class="col-lg-2 col-form-label col-form-label-lg font-weight-bold text-center" >No Layak</label>
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="lantai" class="col-lg-5 col-form-label col-form-label-lg" >Jenis Lantai Rumah</label>
                                            <div class="col-lg-3">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $lantai . '">
                                            </div>
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[0]->$lantai->layak . '">
                                            </div>
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[0]->$lantai->nolayak . '">
                                            </div>  
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="dinding" class="col-lg-5 col-form-label col-form-label-lg" >Jenis Dinding Rumah</label>
                                            <div class="col-lg-3">
                                                <input class="form-control form-control-lg" id="dinding" aria-describedby="emailHelp" readonly value="'. $dinding . '">
                                            </div>
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[1]->$dinding->layak . '">
                                            </div>
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[1]->$dinding->nolayak . '">
                                            </div>  
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Penerangan Yang Digunakan</label>
                                            <div class="col-lg-3">
                                                <input class="form-control form-control-lg" id="nama" aria-describedby="emailHelp" readonly value="'. $penerangan . '">
                                            </div>   
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[2]->$penerangan->layak . '">
                                            </div>
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[2]->$penerangan->nolayak . '">
                                            </div>  
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Pekerjaan Kepala Rumah Tangga</label>
                                            <div class="col-lg-3">
                                                <input class="form-control form-control-lg" id="nama" aria-describedby="emailHelp" readonly value="'. $pekerjaan . '">
                                            </div>   
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[3]->$pekerjaan->layak . '">
                                            </div>
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[3]->$pekerjaan->nolayak . '">
                                            </div>  
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Jumlah Penghasilan</label>
                                            <div class="col-lg-3">
                                                <input class="form-control form-control-lg" id="nama" aria-describedby="emailHelp" readonly value="'. $penghasilan . '">
                                            </div>   
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[4]->$penghasilan->layak . '">
                                            </div>
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[4]->$penghasilan->nolayak . '">
                                            </div>  
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Kepemilikan Aset</label>
                                            <div class="col-lg-3">
                                                <input class="form-control form-control-lg" id="nama" aria-describedby="emailHelp" readonly value="'. $aset . '">
                                            </div>   
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[5]->$aset->layak . '">
                                            </div>
											<div class="col-lg-2">
                                                <input class="form-control form-control-lg" id="lantai" aria-describedby="emailHelp" readonly value="'. $data_perhitungan[5]->$aset->nolayak . '">
                                            </div>  
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >P (Layak)</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="hoaks" aria-describedby="emailHelp" readonly value="'. $data_count_layak[6]->total . ' / '. $data_count_total[6]->total . ' = '. $data_count_layak[6]->total/$data_count_total[6]->total . '">
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >P (Tidak Layak)</label>
                                            <div class="col-lg-7">
                                                <input class="form-control form-control-lg" name="hoaks" aria-describedby="emailHelp" readonly value="'. $data_count_nolayak[6]->total . ' / '. $data_count_total[6]->total . ' = '. $data_count_nolayak[6]->total/$data_count_total[6]->total . '">
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >P (X | hasil = Layak) * P (Layak)</label>
                                            <div class="col-lg-7">
                                                <textarea rows="7" class="form-control form-control-lg" name="hoaks" aria-describedby="emailHelp" readonly >'. $data_perhitungan[0]->$lantai->layak .' * ' . $data_perhitungan[1]->$dinding->layak .' * '. $data_perhitungan[2]->$penerangan->layak .' * '. $data_perhitungan[3]->$pekerjaan->layak .' * '. $data_perhitungan[4]->$penghasilan->layak .' * ' . $data_perhitungan[5]->$aset->layak . ' * ('. $data_count_layak[6]->total/$data_count_total[6]->total . ') = ' . $data_perhitungan[0]->$lantai->layak * $data_perhitungan[1]->$dinding->layak * $data_perhitungan[2]->$penerangan->layak * $data_perhitungan[3]->$pekerjaan->layak * $data_perhitungan[4]->$penghasilan->layak * $data_perhitungan[5]->$aset->layak * ($data_count_layak[6]->total / $data_count_total[6]->total) .'</textarea>
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
                                            <label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >P (X | hasil = Tidak Layak) * P (Tidak Layak)</label>
                                            <div class="col-lg-7">
                                                <textarea rows="7" class="form-control form-control-lg" name="hoaks" aria-describedby="emailHelp" readonly >'. $data_perhitungan[0]->$lantai->nolayak .' * ' . $data_perhitungan[1]->$dinding->nolayak .' * '. $data_perhitungan[2]->$penerangan->nolayak .' * '. $data_perhitungan[3]->$pekerjaan->nolayak .' * '. $data_perhitungan[4]->$penghasilan->nolayak .' * ' . $data_perhitungan[5]->$aset->nolayak . ' * ('. $data_count_nolayak[6]->total/$data_count_total[6]->total . ') = ' . $data_perhitungan[0]->$lantai->nolayak * $data_perhitungan[1]->$dinding->nolayak * $data_perhitungan[2]->$penerangan->nolayak * $data_perhitungan[3]->$pekerjaan->nolayak * $data_perhitungan[4]->$penghasilan->nolayak * $data_perhitungan[5]->$aset->nolayak * ($data_count_nolayak[6]->total / $data_count_total[6]->total) .'</textarea>
                                            </div>   
                                        </div>
										<div class="py-2 form-group row">
										<label for="nama" class="col-lg-5 col-form-label col-form-label-lg" >Kesimpulan</label>
										<div class="col-lg-7">
										<input class="form-control form-control-lg" name="hoaks" aria-describedby="emailHelp" readonly value="'. $status .' ">
										</div>   
                                        </div>
										<div class="py-4 form-group">
                                            <h1 class="portfolio-modal-title text-secondary text-uppercase mb-0 text-center" >'. $kelayakan .'</h1>
                                        </div>
										<div class="text-center">
                                            <a class="btn btn-primary btn-lg" href="' . base_url() .'">Cek Ulang</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>'
		;
        return $data;
    }

	public function errors($title, $paragraph = null)
    {
        $data = '<div class="errors">' . $title . '<p class="text-muted">' . $paragraph . '</p></div>';
        return $data;
    }
}
