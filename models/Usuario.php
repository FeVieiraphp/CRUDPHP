<?php



class Usuario {
	private $id;
	private $nome;
	private $sobrenome;
	private $email;
	private $senha;

	function __construct($nome,$sobrenome,$email,$senha)
	{
		$this->nome = $nome;
		$this->sobrenome = $sobrenome;
		$this->email = $email;
		$this->senha = $senha;
		
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}


	public function getSobrenome() {
		return $this->sobrenome;
	}

	public function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}

 	
 	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha() {
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public static function getAll($conn){
		$dados = $conn->query("SELECT * FROM usuarios");

		$arrayUsuarios = [];

		foreach ($dados as $valor){

			
			$usuario = new Usuario($valor['nome'],$valor['sobrenome'],$valor['email'],$valor['senha']);
			$usuario->setId($valor['id']);
			$arrayUsuarios[] = $usuario;
		}

		return $arrayUsuarios;
	}

	public static function find($conn,$id){
		$dados = $conn->prepare("SELECT * FROM usuarios WHERE id=:id");
		$dados->execute(array(
			':id'=>$id
		)); 
		$dadosUsuario = $dados->fetch();
		//return $dados->fetch();
		$usuario = new Usuario($dadosUsuario['nome'],$dadosUsuario['sobrenome'],$dadosUsuario['email'],$dadosUsuario['senha']);
		return $usuario;
	}


	public function salvar($conn){
		$stmt = $conn->prepare('INSERT INTO usuarios (nome,sobrenome,email,senha) VALUES (:nome,:sobrenome,:email,:senha)');
  		$stmt->execute(array(
  			':nome' => $this->nome,
  			':sobrenome' => $this->sobrenome,
  			':email' => $this->email,
  			':senha' => $this->senha,
  		));

	}

	public function atualizar($conn,$id) {
		$stmt = $conn->prepare('UPDATE usuarios SET nome=:nome, sobrenome=:sobrenome, email=:email, senha=:senha WHERE 
			id=:id');
  		$stmt->execute(array(
  			':nome' => $this->nome,
  			':sobrenome' => $this->sobrenome,
  			':email' => $this->email,
  			':senha' => $this->senha,
  			':id' => $id
  		));

	}

	public function deletar($conn,$id) {
			$stmt = $conn->prepare('DELETE FROM telefones WHERE usuario_id=:id');
		$stmt->execute(array(
			':id' => $id ));

			$stmt = $conn->prepare('DELETE FROM endereco WHERE usuario_id=:id');
		$stmt->execute(array(
			':id' => $id ));



		$stmt = $conn->prepare('DELETE FROM usuarios WHERE id=:id');
		$stmt->execute(array(
			':id' => $id ));

	}

	public function endereco($conn,$id) { 
		$dados = $conn->prepare("SELECT * FROM endereco WHERE usuario_id=:id");
		$dados->execute(array(
			':id'=>$id
		)); 
		$dadosEndereco = $dados->fetch();
		return $dadosEndereco;

}

public function telefones($conn,$id) { 
		$dados = $conn->prepare("SELECT * FROM telefones WHERE usuario_id=:id");
		$dados->execute(array(
			':id'=>$id
		)); 
		$dadosTelefones = $dados->fetchAll();
		$telefones = [];
		foreach ($dadosTelefones as $tel) {
			$telefones[$tel["tipo"]] = $tel["numero"];
		}
		return $telefones;

}

}