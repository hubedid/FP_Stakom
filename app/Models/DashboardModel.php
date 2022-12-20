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
}

?>

