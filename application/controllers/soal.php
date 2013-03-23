<?php

	/*
	// Nama kelas : Soal.php
	// Peran 	  : Controller untuk soal
					- index, index dari soal, bisa menambah soal dan edit
					- add, handle request POST menambah soal
					
					- ubah, halaman edit
					- simpan_ubah, handle request POST mengubah soal


	*/

	class Soal extends CI_Controller{
		function __construct(){
			parent :: __construct();
			$this->load->helper('url'); 
			$this->load->model('Soal_model'); //meload data dari soal_model
		
			// load library
			$this->load->library(array('table','form_validation'));		
		}
		
		function index(){
			$this->load->library('session');
			
			
			$username = $this->session->userdata('username');
			

			$data['data_soal']=$this->Soal_model->selectByUser($username); //data_soal menampung data dari soal_model dengan method selectAll
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('soal_view',$data); //soal_view menampung data dari $data
			$this->load->view('templates/footer_logout', $data);
		}
		
		function add(){
			$this->load->library('session');
			
			if($_POST==NULL){
				$this->load->view('soal_view');
			}else{
				$data = array(
                            'text_soal' => $this->input->post('soal'),
                            'jawaban' => $this->input->post('jawaban'),
			    'flag' => 0,
                            'tag' => $this->input->post('tag'),
			    'username' => $this->session->userdata('username'),
			    'lock' => 0);
				
				$this->Soal_model->add_soal($data);

				redirect('soal/index','refresh'); 
			}			 
		}
		
		function ubah($id_soal){
			
			$data['data_soal']=$this->Soal_model->selectsoal($this->uri->segment(3)); 
		
			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('soal_ubah',$data);
			$this->load->view('templates/footer_logout', $data);
			
		}
		
		function simpan_ubah(){
			$this->load->library('session');
			
			if($_POST==NULL){
				redirect('soal/add');
			}else{
				$id_soal = $this->input->post('id_soal');
				
				$data = array(
					'text_soal' => $this->input->post('soal'),
					'lock' => $this->input->post('lock'),
					'jawaban' => $this->input->post('jawaban'),
					'tag' => $this->input->post('tag'),
					'username' => $this->session->userdata('username'));
				
				$this->Soal_model->simpan_ubah($id_soal, $data);
				
				redirect('soal/ubah/'.$id_soal,'refresh');
			}
		}
	}
?>