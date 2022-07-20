<?php

include ("../model/usuario.php"); 

$user = new Registrar();
$user->cadastroColaborador();
class Registrar{
    private $user;

    public function cadastroColaborador(){
       $this->user = new Colaborador();
       $this->user->setCPFCNPJ($_POST['cpfcnpj']);
       $this->user->setNome($_POST['Nome']);
       $this->user->setTelefone($_POST['telefone']);
       $this->user->setEmail($_POST['Email']);
       $this->user->setLocalizacao($_POST['Localizacao']);
       $this->user->setEspecificacao($_POST['Especificacao']);
       $this->cadastrar();
    }
    
    private function cadastrar(){
        $resultado = $this->user->incluir();
        if($resultado){
            echo '<script>
            alert("usuario cadastrado com sucesso");
            window.location.replace("http://localhost:81/tcc/index.php");
            </script>';
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
            header("Location: http://localhost:81/tcc/index.php?errocad='ok'");
        }
    }    


}

?>

