<?php
require ('../config/conexao.php');
require ('../models/Endereco.php');
require ('../models/Usuario.php');
require ('../models/Telefone.php');



$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$id = $_POST['id'];

$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

$telefones = $_POST['telefones'];

$usuario = new Usuario($nome,$sobrenome,$email,$senha);
$usuario->atualizar($conn,$id);

$endereco = new Endereco($id, $cep, $uf, $cidade, $rua, $bairro, $numero, $complemento);
$endereco->atualizar($conn,$id);

foreach ($telefones as $tel) {
	$telefone = new Telefone($id, $tel['numero'], $tel['tipo']);
	$telefone->atualizar($conn,$id,$tel['tipo']);
}
 

header('Location:../listar_usuarios.php');
