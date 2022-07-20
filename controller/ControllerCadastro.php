<?php
require_once("../model/cadastrColaborador.php");
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    private function incluir(){
        $this->cadastro->setCpfCnpj($_POST['cpfcnpj']);
        $this->cadastro->setNome($_POST['nome']);
        $this->cadastro->setTelefone($_POST['telefone']);
        $this->cadastro->setEmail($_POST['email']);
        $this->cadastro->setLocalizacao($_POST['localizacao']);
        $this->cadastro->setEspecificacao($_POST['especificacao']);
        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/login.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!, verifique se o livro não está duplicado');history.back()</script>";
        }
    }
}

new cadastroController ();
