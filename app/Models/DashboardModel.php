<?php

namespace App\Models;
use CodeIgniter\Model;
Class DashboardModel extends Model
{
    public function get_data_user($sesi) {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('*');
        $builder->where(['id' => $sesi]);
        $result   = $builder->get()->getResult();
		return $result;
	}
    public function get_data_income($sesi, $tahun) {
        $db      = \Config\Database::connect();
        $builder = $db->table('income_user');
        $builder->select('*');
        $builder->where(['user_id' => $sesi]);
        $builder->where(['tahun' => $tahun]);
        $result   = $builder->get()->getResult();
		return $result;
	}
    public function get_data_income_daily($sesi, $bulan, $tahun, $minggu) {
        $db      = \Config\Database::connect();
        $builder = $db->table('daily_income');
        $builder->select('*');
        $builder->where(['user_id' => $sesi]);
        $builder->where(['bulan_id' => $bulan]);
        $builder->where(['tahun' => $tahun]);
        $builder->where(['minggu' => $minggu]);
        $result   = $builder->get()->getResult();
		return $result;
	}
    public function get_data_latih(){
        $db      = \Config\Database::connect();
        $builder = $db->table('data_latih');
        $builder->select('*');
        $result   = $builder->get()->getResult();
		return $result;
    }
    public function get_data_uji(){
        $db      = \Config\Database::connect();
        $builder = $db->table('data_uji');
        $builder->select('*');
        $result   = $builder->get()->getResult();
		return $result;
    }
    public function get_count($atribut, $kelas, $kelayakan){
        $db      = \Config\Database::connect();
        $builder = $db->table('data_latih');
        $builder->select($atribut);
        $builder->where([$atribut => $kelas]);
        $builder->where(['kelayakan' => $kelayakan]);
        $result   = $builder->countAllResults();
		return $result;
    }
    public function get_data_kelas(){
        $db      = \Config\Database::connect();
        $builder = $db->table('kelas_atribut');
        $builder->select('*');
        $builder->join('atribut', 'atribut.id_atribut = kelas_atribut.id_atribut');
        $result   = $builder->get()->getResult();
		return $result;
    }
    public function get_data_atribut(){
        $db      = \Config\Database::connect();
        $builder = $db->table('atribut');
        $builder->select('*');
        $result   = $builder->get()->getResult();
		return $result;
    }
}

?>

