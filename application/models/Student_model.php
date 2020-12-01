<?php

	class Student_model extends CI_model{

			function listStudent(){

			}
		function create($formArray)
		{
			$this->db->insert('eleve',$formArray); // insere mes donnees dans la table eleve
		}
		function all(){
			 $class= $this->db->query('SELECT id_eleve,nom,prenom,nom_classe as classe 
										FROM eleve , classe 
										WHERE eleve.classe_id=classe.id_classe ')->result_array();
			return $class;

		}

		function getUser($user_id){
			$this->db->where('id_eleve',$user_id);
			return $user =$this->db->get('eleve')->row_array(); // selecet all from eleve where id_eleve=
		}


		function updateStudent($user_id,$formArray){
			$this->db->where('id_eleve',$user_id);
			$this->db->update('eleve',$formArray);
		}
		function deleteStudent($user_id){
				$this->db->where('id_eleve', $user_id);
				$this->db->delete('eleve');
		}




}

?>
