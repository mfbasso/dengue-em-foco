<?php
	class Foco extends CI_Model {

		public $endereco;
		public $tipo;
		public $idLocal;
		public $idAcesso;

		public function __construct() {
			parent:: __construct();
		}

		public function registrarFoco ($endereco="", $tipo="", $idLocal="", $idAcesso="")
		{
			
		}
	}
?>
