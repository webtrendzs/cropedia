<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		
		$data['title']="I am getting started";
		
		$this->layouts->renderView('welcome_message',$data);
	}
}
