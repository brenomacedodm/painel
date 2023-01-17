<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model', 'user');
		$this->load->model('configuracao_model', 'conf');
	}
	public function index(){
		$this->conf->checar_banco();		

		$this->load->view('index');
	}

	public function login(){
		$dados_form = $this->input->post();

		if($this->user->login($dados_form['user'], $dados_form['senha'])){
			$this->load->view('home');
		} else {
			$dados['error'] = true;
			$this->load->view('index', $dados);
		}

	}
}
