<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Login extends CI_Model
	{
		public $nomeUsuario;
		public $emailUsuario;
		public $fotoUsuario;

		public function __construct() {
			parent:: __construct();
		}

		public function validar ($nomeUsuario, $emailUsuario, $fotoUsuario="")
		{
			if($nomeUsuario!="" && $emailUsuario!=""){
				$array = array('idUsuario' => 1, 'logged_in'=>true);
				$this->session->set_userdata($array);
			}
			else
				session_write_close(oid);
		}
	}
?>
