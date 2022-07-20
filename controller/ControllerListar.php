<?php
require_once("../model/banco.php");
class listarController{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();

    }

    private function criarTabela(){
        $row = $this->lista->getL();

            foreach ($row as $value){
                echo "<tr>";
                echo "<th>".$value['nome'] ."</th>";
                echo "<td>".$value['telefone'] ."</td>";
                echo "<td>".$value['email'] ."</td>";
                echo "<td> R$".$value['descricao'] ."</td>";
                echo "<td>".$value['endereco'] ."</td>";
                echo "<td>".$value['cpfcnpj'] = ($value['cpfcnpj'] == "0") ? "Desativado":"Ativado" ."</td>";
                echo "<td><a class='btn btn-warning' href='editar.php?id=".$value['nome']."'>Editar</a><a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=".$value['nome']."'>Excluir</a></td>";
                echo "</tr>";
        }
    }
}

