<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{
    public function __construct(){
		parent::__construct();   
	}

    public function login($login, $senha){
        try{
            $sql = "SELECT * FROM `usuarios` where `login` = '$login' AND `senha` = '$senha' LIMIT 1";
            $usuario = $this->db->query($sql);
            if($usuario->num_rows() == 1){
                $resultado = $usuario->result()[0];
            }
        } catch (Exception $e){
            return $e->getMessage();
        }

        if($usuario->num_rows() == 1){
            $this->session->set_userdata(array(
                'Usuario'   => $resultado->nome_usuario,
                'Login'     => $resultado->login
            ));
            return true;
        }
        return false;
    }
}