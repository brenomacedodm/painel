<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracao_model extends CI_Model
{

    public function __construct(){
        parent::__construct();
        $this->load->dbforge();
        $this->load->dbutil();
    }

    public function checar_banco()
    {
        //checa se as tabelas `usuarios` e `projetos` existem
        try{
            if (!$this->db->table_exists('usuarios') and !$this->db->table_exists('projetos')){
                $usuarios_fields = array(
                    
                    'nome_usuario' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 100,
                    ),
                    'senha' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 50,
                    ),
                    'login' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 50,
                    )
                );

                $this->dbforge->add_field('id');
                $this->dbforge->add_field($usuarios_fields);
                $this->dbforge->create_table('usuarios');

                $sql = "INSERT INTO `usuarios` (`nome_usuario`, `login`, `senha`) VALUES ('Admin', 'admin', '123456')";
                $this->db->query($sql);

                $projetos_fields = array(
                    'titulo' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 100,
                    ),
                    'descricao' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 255,
                    ),
                    'status' => array(
                        'type'=> 'int',
                    ),
                    'link' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 144,
                    )
                );

                $this->dbforge->add_field('id');
                $this->dbforge->add_field($projetos_fields);
                $this->dbforge->create_table('projetos');

                return true;    
            }else if (!$this->db->table_exists('usuarios')) {
                $usuarios_fields = array(
                    'id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                    ),
                    'nome_usuario' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 100,
                    ),
                    'senha' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 50,
                    ),
                    'login' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 50,
                    )
                );

                $this->dbforge->add_field($usuarios_fields);
                $this->dbforge->create_table('usuarios');

                $sql = "INSERT INTO `usuarios` (`nome_usuario`, `login`, `senha`) VALUES ('Admin', 'admin', '123456')";
                $this->db->query($sql);

                return true;
            } else if (!$this->db->table_exists('projetos')) {
                $projetos_fields = array(
                    'id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                    ),
                    'titulo' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 100,
                    ),
                    'descricao' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 255,
                    ),
                    'status' => array(
                        'type'=> 'int',
                    ),
                    'link' => array(
                        'type'=> 'VARCHAR',
                        'constraint' => 144,
                    )
                );

                $this->dbforge->add_field($projetos_fields);
                $this->dbforge->create_table('projetos');

                return true;
            } else {
                $admin = $this->db->get_where('usuarios', array('login' => 'admin'));
                if($admin->num_rows() == 0){
                    $sql = "INSERT INTO `usuarios` (`nome_usuario`, `login`, `senha`) VALUES ('Admin', 'admin', '123456')";
                    $this->db->query($sql);
                }
            }
        } catch (Exception $e){
            return $e->get_message();
        }
    }
}