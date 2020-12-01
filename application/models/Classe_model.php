<?php

class Classe_model extends CI_model{

	function create($formArray)
	{
		$this->db->insert('eleve',$formArray);
	}

	function all(){
			$class= $this->db->get('classe')->result_array(); // select * FROM classe
		return $class;

	}



}

?>
