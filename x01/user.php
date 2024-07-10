<?php 
include("connect.php");

 
class User{
    public $nome;
    public $sobrenome;
    public $idade;
    public $dataCad;

    //Getters

    public function getNome(){
        return $this->nome;
    }
    public function getSobrenome(){
        return $this->sobrenome;
    }
    public function getIdade(){
        return $this->idade;
    }
    public function getData(){
        return $this->dataCad;
    }

    //Setters
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }
    public function setIdade($idade) {
        $this->idade = $idade;
    }
    public function setDataCad($dataCad) {
        $this->dataCad = $dataCad;
    }

    //Funções Gerais ---------------------------------------

    public function __construct($nome, $sobrenome, $idade, $dataCad) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->idade = $idade;
        $this->dataCad = $dataCad;

    }

    public function createUser($nome, $sobrenome, $idade){
        $msql = new mysqli("localhost", 'root', '', 'cursophp');
        $dataCad = date("Y-m-d");
        echo $dataCad;
        $sql = "INSERT INTO users (nm_nome, nm_sobrenome, vl_idade, dt_cadastro) VALUES('$nome', '$sobrenome', $idade, '$dataCad')";
        if($msql->query($sql) === TRUE){
            echo "Novo registro criado com sucesso<br>";
        } else {
            echo "Erro: " . $sql . "<br>" . $msql->error . "<br>";
        }
    }

    public function updateUser($id, $nome, $idade, $sobrenome){

        $msql = new mysqli("localhost", 'root', '', 'cursophp');

        
        $sql = "UPDATE users SET nm_nome='$nome', nm_sobrenome='$sobrenome', vl_idade='$idade' WHERE id='$id'";
        if($msql->query($sql) === TRUE){
            echo "Registro atualizado com sucesso<br>";
        } else {
            echo "Erro: " . $sql . "<br>" . $msql->error . "<br>";
        }
    }

    public function deleteUser($id){
        $msql = new mysqli("localhost", 'root', '', 'cursophp');

        $sql = "DELETE from users WHERE id = $id";
        if($msql->query($sql) === TRUE){
            echo "Registro excluido com sucesso<br>";
        } else {
            echo "Erro: " . $sql . "<br>" . $msql->error . "<br>";
        }
        

    }


}





?>