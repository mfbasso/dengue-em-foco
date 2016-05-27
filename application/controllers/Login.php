<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function oauth()
	{
		$this->output->set_content_type('application/json');
		$usuario = json_decode($this->input->post('usuario'));
		//var_dump(json_decode($this->input->post('usuario')));
		$array = ['userName'=>$usuario->{'userName'}, 'userEmail'=>$usuario->{'userEmail'}, 'userPhoto'=>$usuario->{'userPhoto'}];
	 	$this->session->set_userdata($array);
	 	return;
	}
}
?>
