<?php

require_once("init.php");

$conn = mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO, BD_PORTA);

if (!$conn) {
    die("A conexão falhou: " . mysqli_connect_error());
}

class Banco {
    protected $mysqli;
    
    public function __construct() {

        echo "Conexão efetuada com sucesso";
        $this->conexao();

    }
    # Métodos criados para iniciar a conexão com o banco de dados
    private function conexao() {
        $this->mysqli = new mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
       
    }
        
    
}