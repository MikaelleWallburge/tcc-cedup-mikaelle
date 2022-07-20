<?php
require_once("../model/banco.php");

class editarController {

    private $editar;
    private $nome;
    private $cpfcnpj;
    private $email;
    private $telefone;
    private $descricao;
    private $endereco;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $row = $this->editar->cadastroColaborador($id);
        $this->nome         =$row['nome'];
        $this->cpfcnpj        =$row['cpfcnpj'];
        $this->email   =$row['email'];
        $this->telefone        =$row['telefone'];
        $this->descricao       =$row['descricao'];
        $this->endereco        =$row['endereco'];

    }
    public function editarFormulario($nome,$cpfcnpj,$email,$telefone,$descricao,$endereco,$id){
        if($this->editar->updateColaborador($nome,$cpfcnpj,$email,$telefone,$descricao,$endereco,$id) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getNome(){
        return $this->nome;
    }
    public function getCpfCnpj(){
        return $this->cpfcnpj;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getEndereco(){
        return $this->endereco;
    }


}
$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['nome'],$_POST['cpfcnpj'],$_POST['email'],$_POST['telefone'],$_POST['descricao'],$_POST['endereco'],$_POST['id']);
}
?>
