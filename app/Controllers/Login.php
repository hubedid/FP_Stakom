<?php

namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		$this->session = \Config\Services::session();
		if(!$this->session->get('logged_in')){
			return view('auth/login');
		}else{
			return redirect()->to('/');
		}
		
		// echo "tes";
	}

	//--------------------------------------------------------------------

}
