<?php

/**
* 
*/
class Users extends Controller
{
	
	protected function Index($value='')
	{
		$viewmodel = new UserModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	public function register()
	{
		$viewmodel = new UserModel();
		$this->ReturnView($viewmodel->register(), true);
	}

	public function login()
	{
		$viewmodel = new UserModel();
		$this->ReturnView($viewmodel->login(), true);
	}

	public function logout()
	{
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);

		session_destroy();
		// Redirect
		header('Location: ' . ROOT_URL);
	}
}