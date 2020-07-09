<?php 
require ('../models/Usuario.php');
require ('../config/conexao.php');


 $id = $_GET['id'];

 //$dadosUsuario = Usuario::find($conn,$id);
 //$usuario = new Usuario($dadosUsuario['nome'],$dadosUsuario['sobrenome'],$dadosUsuario['email'],$dadosUsuario['senha']);
 $usuario = Usuario::find($conn,$id);
 $usuario->deletar($conn,$id);


 header('Location:../listar_usuarios.php');

 ?>