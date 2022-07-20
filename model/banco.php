<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        try {
            $this->conexao();
        } catch (Exception $e) {
            Echo "Erro:".$e->getMessage();
        }
        
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function login($email,$senha){
        $stmt = $this->mysqli->prepare("SELECT email FROM usuario WHERE email=? and senha=?");
        $stmt->bind_param("ss",$email,$senha);
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        if ($rows>0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
           
    }
    public function setColaborador($CNPJ,$Nome,$Telefone,$Email,$Localizacao,$Especificacao){
        $stmt = $this->mysqli->prepare("INSERT INTO Colaborador (`CPFCNPJ`, `Nome`, `Telefone`, `Email`, `Localizacao`, `Especificacao`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$CNPJ,$Nome,$Telefone,$Email,$Localizacao,$Especificacao);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getColaborador(){
        $array = array();
        $result = $this->mysqli->query("SELECT * FROM Colaborador");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function deleteColaborador($id){
        if($this->mysqli->query("DELETE FROM `Colaborador` WHERE `nome` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }
   
    public function updateColaborador($Nome,$Telefone,$Email,$Localizacao,$Especificacao){
        $stmt = $this->mysqli->prepare("UPDATE `Colaborador` SET `Nome` = ?, `Telefone`=?, `Email`=?, `Localizacao`=?, `Especificacao`=? WHERE `Nome` = ?");
        $stmt->bind_param("sssssss",$Nome,$Telefone,$Email,$Localizacao,$Especificacao);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>
