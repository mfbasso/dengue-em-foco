<?php
	class Local extends CI_Model {

		public $cidade;
		public $uf;

		public function __construct() {
			parent:: __construct();
		}

		public function consultarLocal($cidade="", $uf="") {
			$resultado = $this->db->query('SELECT DISTINCT * FROM local WHERE cidade LIKE %$cidade% AND uf = $uf');
			if(count($resultado)>0)
				return $resultado;
			else
				return 0;
		}
	}
?>
