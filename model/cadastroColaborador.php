<?php
require_once("banco.php");

class Cadastro extends Banco {

    private $CPFCNPJ;
    private $Nome;
    private $Telefone;
    private $Email;
    private $Localizacao;
    private $Especificacao;

    //Metodos Set
    public function setCPFCNPJ($string){
        $this->getCpfCnpj = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setLocalizacao($string){
        $this->localizacao = $string;
    }
    public function setEspecificacao($stringespecificacao){
        $this->localizacao = $string;
    }
    //Metodos Get
    public function getCPFCNPJ(){
        return $this->cpfcnpj;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getLocalizacao(){
        return $this->localizacao;
    }
    public function getEspecificacao(){
        return $this->especificacao;
    }

      
    public function incluir(){
        return $this->setColaborador($this->getCPFCNPJ(),$this->getNome(),$this->getTelefone(),$this->getEmail(),$this->getLocalizacao(),$this->getEspecificacao());
    }
}
?>
