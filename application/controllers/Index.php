<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('projeto_model', 'projetos');
		$this->load->model('configuracao_model', 'conf');
	}
	public function index(){
		$this->conf->checar_banco();

		

		$this->load->view('index');
	}

	public function login(){

	}
}
