<?php 
 require 'templates/header.php';
 require 'config/conexao.php';
 require 'models/Usuario.php';
 

?>
<div class="container">
	<table class="table table-dark">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Sobrenome</th>
				<th>Email</th>
				<th>Cidade</th>
				<th>Estado</th>
				<th colspan="100%">Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach(Usuario::getAll($conn) as $usuario): ?>
				<tr>
					<td><?php echo $usuario->getNome(); ?></td>
					<td><?php echo $usuario->getSobrenome(); ?></td>
					<td><?php echo $usuario->getEmail(); ?></td>
					<td><?php echo $usuario->endereco($conn,$usuario->getId())['cep']; ?></td>
					<td><?php echo $usuario->endereco($conn,$usuario->getId())['uf']; ?></td>
					<td><a href="edicao_usuario.php?id=<?php echo $usuario->getId()  ?>">Editar</a></td>
					<td><a href="controllers/deletar_usuario.php?id=<?php echo $usuario->getId()  ?>">Deletar</a></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<?php 
require 'templates/footer.php';

?>