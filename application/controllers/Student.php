<?php
	class Student extends CI_Controller {
		// mon constructeur
		 public function __construct(){
		 	parent::__construct();
			 $this->load->model('Classe_model');
			 $this->load->model('Student_model');
		 }

		public function createStudent(){
			// chargement des model a utiliser

			// creation d'un tableau de data avec pour variable classes qui recupere les donnees dans ma table classe
			$data['classes']=$this->Classe_model->all();
			$this->form_validation->set_rules('nom','NOM','required');
			$this->form_validation->set_rules('prenom','PRENOM','required');
			$this->form_validation->set_rules('classe','CLASSE','required');
			if ($this->form_validation->run()== false){
				$this->load->view('create_student', $data);
			}else{
				$formArray=array();
				$formArray['nom']=$this->input->post('nom');
				$formArray['prenom']=$this->input->post('prenom');
				$formArray['classe_id']=$this->input->post('classe');
				$this->Student_model->create($formArray);
				$this->session->set_flashdata('success','Record added successfully');
				redirect(base_url().'index.php/student/listStudent');
			}
		}

		 function edit($studen_id){

			// chargement des model a utiliser

			// data c'est un tableau de variable qui peut prendre autant de variable possible

			 $data['classes']=$this->Classe_model->all();
			 $data['student'] =$this->Student_model->getUser($studen_id);
			if($this->input->post()){
				$this->form_validation->set_rules('nom','NOM','required');
				$this->form_validation->set_rules('prenom','PRENOM','required');
				$this->form_validation->set_rules('classe','CLASSE','required');
				if ($this->form_validation->run()== false){
					$this->load->view('edit_student', $data);

				} else{
					$formArray=array();
					$formArray['nom']=$this->input->post('nom');
					$formArray['prenom']=$this->input->post('prenom');
					$formArray['classe_id']=$this->input->post('classe');
					$this->Student_model->updateStudent($studen_id,$formArray);
					$this->session->set_flashdata('success','Modifier avec succes ');
					redirect(base_url().'index.php/student/listStudent');
				}
			}
			else{
				$this->load->view('edit_student',$data);

			}
		}

		public function listStudent(){
			$users = $this->Student_model->all();
			$data['users']=$users;// on utilisera la variable $users qui entre les cotes
			$this->load->view('list_student',$data);
		}

		public function delete($user_id){
			$user = $this->Student_model->getUser($user_id);
			if(empty($user)){
				$this->session->set_flashdata('failure','element introuvable');
				redirect(base_url().'index.php/student/listStudent');
			}
			 $this->Student_model->deleteStudent($user_id);
			$this->session->set_flashdata('success','element supprimer avec succes ');
			redirect(base_url().'index.php/student/listStudent');

		}

	}




?>
