<?php

	class Room extends CI_controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Classe_model');
			$this->load->model('Student_model');
		}
	function classes (){
		$users = $this->Classe_model->all();
		$data['users']=$users;// on utilisera la variable $users
		$this->load->view('list_class',$data);
	}
		function Edit_classes(){
			$this->load->view('create_room');
		}
		public function listclass(){
			$users = $this->Classe_model->all();
			$data['users']=$users;// on utilisera la variable $users
			$this->load->view('list_class',$data);

		}
	}
?>
