<?php

/**
* 
*/
class Shares extends Controller
{
	
	protected function Index($value='')
	{
		$viewmodel = new ShareModel();
		$this->ReturnView($viewmodel->Index(), true);
	}

	public function add()
	{
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: ' .ROOT_URL. 'shares');
		}
		
		$viewmodel = new ShareModel();
		$this->ReturnView($viewmodel->add(), true);
	}
}