<?php

/**
* 
*/
class Home extends Controller
{
	
	protected function Index($value='')
	{
		$viewmodel = new HomeModel();
		$this->ReturnView($viewmodel->Index(), true);
	}
}