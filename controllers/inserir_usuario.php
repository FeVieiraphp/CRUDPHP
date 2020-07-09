<?php
session_start();
require ('../config/conexao.php');
require ('../models/Endereco.php');
require ('../models/Usuario.php');
require ('../models/Telefone.php');



$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];


$cep = $_POST['cep'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];


$telefones = $_POST['telefones'];




$erros = [];

if (empty($nome)) {
	$erros['nome'] = "Nome nao preenchido";
}

if (empty($sobrenome)) {
	$erros['sobrenome'] = "Sobrenome nao preenchido";
}

if (empty($email)) {
	$erros['email'] = "Email nao preenchido";
}

if (empty($senha)) {
	$erros['senha'] = "Senha nao preenchido";
	
}

if (empty($cep) || strlen($cep) != 8) {
	$erros['cep'] = "Cep nao preenchido corretamente";
	
}

if (empty($uf) || strlen($uf) != 2) {
	$erros['uf'] = "Uf nao preenchido corretamente";
	
}

if (empty($rua)) {
	$erros['rua'] = "Rua nao preenchido";
	
}

if (empty($bairro)) {
	$erros['bairro'] = "Bairro nao preenchido";
	
}

if (empty($numero)) {
	$erros['numero'] = "Numero nao preenchido";
	
}

if (empty($complemento)) {
	$erros['complemento'] = "Complemento nao preenchido";
	
}
	
if (empty($telefones[0]['numero'])) {
	$erros['telefones'] = "Campo celular não preenchido corretamente";
	
}

if (empty($telefones[1]['numero'])) {
	$erros['telefones'] = "Campo telefone Residencial não preenchido corretamente";
	
}

if (empty($telefones[2]['numero'])) {
	$erros['telefones'] = "Campo telefone Comercial não preenchido corretamente";
	
}

if ($erros) {
	$_SESSION["erros"] = $erros;
	header('Location:../cadastro_usuario.php');
	die();
}





$usuario = new Usuario($nome, $sobrenome, $email, $senha, $conn);
$usuario->salvar($conn);
$usuarioId  = $conn->lastInsertId();



$endereco = new Endereco($usuarioId, $cep, $uf, $cidade, $rua, $bairro, $numero, $complemento);
$endereco->salvar($conn);
$usuarioId  = $conn->lastInsertId();


foreach ($telefones as $tel) {
	$telefone = new Telefone($usuarioId, $tel['numero'], $tel['tipo']);
	$telefone->salvar($conn);
}



header('Location:../listar_usuarios.php');