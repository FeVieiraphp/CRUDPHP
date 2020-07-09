<?php
	session_start(); 
 	require 'templates/header.php';


?>
<div class="container col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4" >

	<?php if (isset($_SESSION['erros'])): ?>
		<?php foreach($_SESSION['erros'] as $erro): ?>
			<div class="alert alert-danger">
  				<strong><?php echo $erro; ?></strong> 
			</div>
		<?php endforeach ?>
	<?php endif ?> 
	<form action="controllers/inserir_usuario.php " method="POST" onsubmit="validar(event)">
		<h2 class="text-center"> Insira seus <b>Dados</b> para realizarmos seu cadastro! </h2>
		
		<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-user"></span>
  				</div>
				<input type="text"  class="form-control" name="nome" id="nome" placeholder="Nome">
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["nome"]) ? $_SESSION['erros']["nome"] : "" ?> </div>
		</div>


		<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-user"></span>
  				</div>
				<input type="text"  class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["sobrenome"]) ? $_SESSION['erros']["sobrenome"] : "" ?> </div>
		</div>

		<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-envelope"></span>
  				</div>
				<input type="email"  class="form-control" id="email" name="email" placeholder="Email" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["email"]) ? $_SESSION['erros']["email"] : "" ?> </div>
		</div>

		<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-option-horizontal"></span>
  				</div>
			<input type="password"  class="form-control" id="senha" name="senha" placeholder="Senha" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["senha"]) ? $_SESSION['erros']["senha"] : "" ?> </div>
		</div>

			<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-globe"></span>
  				</div>
			<input type="text"  class="form-control" id="cep" name="cep" placeholder="Cep" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["cep"]) ? $_SESSION['erros']["cep"] : "" ?> </div>
		</div>

			<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-globe"></span>
  				</div>
			<input type="text"  class="form-control" id="uf" name="uf" placeholder="UF" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["uf"]) ? $_SESSION['erros']["uf"] : "" ?> </div>
		</div>


			<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-globe"></span>
  				</div>
			<input type="text"  class="form-control" id="cidade" name="cidade" placeholder="Cidade" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["cidade"]) ? $_SESSION['erros']["cidade"] : "" ?> </div>
		</div>


			<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-home"></span>
  				</div>
			<input type="text"  class="form-control" id="rua" name="rua" placeholder="Rua" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["rua"]) ? $_SESSION['erros']["rua"] : "" ?> </div>
		</div>

			<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-home"></span>
  				</div>
			<input type="text"  class="form-control" id="bairro" name="bairro" placeholder="Bairro" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["bairro"]) ? $_SESSION['erros']["bairro"] : "" ?> </div>
		</div>


			<div class="form-group">
			<div class="input-group">
  				<div class="input-group-addon">
  					<span class="glyphicon glyphicon-home"></span>
  				</div>
			<input type="text"  class="form-control" id="numero" name="numero" placeholder="Numero" >
			</div>
			<div class="erro"><?php echo  isset($_SESSION['erros']["numero"]) ? $_SESSION['erros']["numero"] : "" ?> </div>
		</div>

		<div class="form-group">
		<div class="input-group">
  			<div class="input-group-addon">
  				<span class="glyphicon glyphicon-home"></span>
  			</div>
			<input type="text"  class="form-control" id="complemento" name="complemento" placeholder="Complemento" >
			</div>
		<div class="erro"><?php echo  isset($_SESSION['erros']["complemento"]) ? $_SESSION['erros']["complemento"] : ""?> </div>
		</div>

		<h3> Telefones <h3>

		<div class="form-group">
		<div class="input-group">
  			<div class="input-group-addon">
  				<span class="glyphicon glyphicon-earphone"></span>
  			</div>
			<input type="hidden"  class="form-control" name="telefones[0][tipo]" value ="celular">
			<input type="text"  class="form-control" name="telefones[0][numero]" placeholder="Celular" id="numeroCel">

			</div>
		<div class="erro"><?php echo  isset($_SESSION['erros']["telefones[0][tipo]"]) ? $_SESSION['erros']["telefones[0][tipo]"] : ""?> </div>
		</div>

		<div class="form-group">
		<div class="input-group">
  			<div class="input-group-addon">
  				<span class="glyphicon glyphicon-earphone"></span>
  			</div>
			<input type="hidden"  class="form-control" name="telefones[1][tipo]" value ="residencial">
			<input type="text"  class="form-control" name="telefones[1][numero]" placeholder="Residencial" id="numeroRes">
			</div>
		<div class="erro"><?php echo  isset($_SESSION['erros']["telefones[1][tipo]"]) ? $_SESSION['erros']["telefones[1][tipo]"] : ""?> </div>
		</div>

		<div class="form-group">
		<div class="input-group">
  			<div class="input-group-addon">
  				<span class="glyphicon glyphicon-phone-alt"></span>
  			</div>
			<input type="hidden"  class="form-control" name="telefones[2][tipo]" value ="comercial">
			<input type="text"  class="form-control" name="telefones[2][numero]" placeholder="Comercial" id="numeroCom">
			</div>
		<div class="erro"><?php echo  isset($_SESSION['erros']["telefones[2][tipo]"]) ? $_SESSION['erros']["telefones[2][tipo]"] : ""?> </div>
		</div>




		<button class="btn btn-primary">Enviar</button>

	</form>
</div>

<script type="text/javascript">
	function validar(event){
		var nome = document.querySelector('#nome').value;
		var sobrenome = document.querySelector('#sobrenome').value;
		var email = document.querySelector('#email').value;
		var senha = document.querySelector('#senha').value;
		var cep = document.querySelector('#cep').value;
		var uf = document.querySelector('#uf').value;
		var cidade = document.querySelector('#cidade').value;
		var rua = document.querySelector('#rua').value;
		var bairro = document.querySelector('#bairro').value;
		var numero = document.querySelector('#numero').value;
		var numeroCel = document.querySelector('#numeroCel').value;
		var numeroRes = document.querySelector('#numeroRes').value;
		var numeroCom = document.querySelector('#numeroCom').value;


		if(nome == ""){
			event.preventDefault();
		    alert('Preencha o campo nome.');
		    return false;
		}

		if(sobrenome == ""){
			event.preventDefault();
		    alert('Preencha o campo sobrenome.');
		    return false;
		}

		if(email == "" || email.indexOf('@') == -1 ){
			event.preventDefault();
		    alert('Preencha o campo E-mail.');
		    return false;
		}

		if(senha == "" || senha.length <= 5){
			event.preventDefault();
		    alert('Preencha o campo senha com minimo 6 caracteres');
		    return false;
		}

		if(cep == "" || cep.length != 8){
			event.preventDefault();
		    alert('Preencha o campo cep');
		    return false;
		}

		if(uf == "" || uf.length != 2){
			event.preventDefault();
		    alert('Preencha o campo uf');
		    return false;
		}

		if(cidade == ""){
			event.preventDefault();
		    alert('Preencha o campo cidade');
		    return false;
		}

		if(rua == ""){
			event.preventDefault();
		    alert('Preencha o campo rua');
		    return false;
		}

		if(bairro == ""){
			event.preventDefault();
		    alert('Preencha o campo bairro');
		    return false;
		}

			if(numero == ""){
			event.preventDefault();
		    alert('Preencha o campo numero');
		    return false;
		}


		if(numeroCel == "" || numeroCel.length != 11){
			event.preventDefault();
		    alert('Preencha o campo Celular');
		    return false;
		}

		if(numeroRes == "" || numeroRes.length != 10){
			event.preventDefault();
		    alert('Preencha o campo Telefone Residencial');
		    return false;
		}

		if(numeroCom == "" || numeroCom.length != 10){
			event.preventDefault();
		    alert('Preencha o campo Telefone Comercial');
		    return false;
		}



	}
</script>

<?php unset($_SESSION['erros']); ?>
<?php require 'templates/footer.php'; ?>