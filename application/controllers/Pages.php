<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function view($page = 'home')
	{
	        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
	        {
             // Whoops, we don't have a page for that!
             show_404();
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	      	//$this->load->view('templates/header', $data);
	      	$this->load->view('pages/'.$page, $data);
	      	//$this->load->view('templates/footer', $data);
	}

	public function login($page = 'validar')
	{
		if($page == 'validar')
		{
			if($_POST)
				$data['userName'] = $_POST['userName'];
				$data['userEmail'] = $_POST['userEmail'];
				$data['userPhoto'] = $_POST['userPhoto'];
	  		$this->load->model('oauth/login');
	  		$this->login->validar($data['userName'], $data['userEmail'], $data['userPhoto']);
	  	}
	  	else if($page == 'redirecionar')
	  	{
	  		if($_SESSION)
			{
				if($this->session->has_userdata('logged_in'))
					redirect(site_url().'/pages/view/mapa');
			}
		}
		else
			show_404();
	}
}
?>
