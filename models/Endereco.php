<?php


class Endereco {
	private $usuario_id;
	private $cep;
	private $uf;
	private $cidade;
	private $rua;
	private $bairro;
	private $numero;
	private $complemento;


	function __construct($usuario_id, $cep, $uf, $cidade, $rua, $bairro, $numero, $complemento)
	{
		$this->usuario_id = $usuario_id;
		$this->cep = $cep;
		$this->uf = $uf;
		$this->cidade = $cidade;
		$this->rua = $rua;
		$this->bairro = $bairro;
		$this->numero = $numero;
		$this->complemento = $complemento;
		
	}

	public function getUsuario_id() {
		return $this->usuario_id;
	}

	public function setUsuario_id($usuario_id){
		$this->usuario_id = $usuario_id;
	}


	public function getCep() {
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

 	
 	public function getUf() {
		return $this->uf;
	}

	public function setUf($uf){
		$this->uf = $uf;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getRua() {
		return $this->rua;
	}

	public function setRua($rua){
		$this->rua = $rua;
	}

	public function getBairro() {
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}


	public function getNumero() {
		return $this->cidade;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}


	public function getComplemento() {
		return $this->complemento;
	}

	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}

	public static function getAll($conn){
		$dados = $conn->query("SELECT * FROM endereco");
		return $dadosEndereco;
	}

	public static function find($conn,$id){
		$dadosEndereco = $conn->prepare("SELECT * FROM endereco WHERE id=:id");
		$dadosEndereco->execute(array(
			':id'=>$id
		)); 
		$dadosEndereco = $dadosEndereco->fetch();
		//return $dados->fetch();
		$endereco = new Endereco($dadosEndereco['usuario_id'],$dadosUsuario['cep'],$dadosUsuario['uf'],$dadosUsuario['cidade'],$dadosEndereco['rua'],$dadosEndereco['bairro'],$dadosEndereco['numero'],$dadosEndereco['complemento']);
		return $endereco;
	}


	public function salvar($conn){
		$stmt = $conn->prepare('INSERT INTO endereco (usuario_id, cep, uf, cidade, rua, bairro, numero, complemento) VALUES (:usuario_id, :cep, :uf, :cidade, :rua, :bairro, :numero, :complemento)');
  		$stmt->execute(array(
  			':usuario_id' => $this->usuario_id,
  			':cep' => $this->cep,
  			':uf' => $this->uf,
  			':cidade' => $this->cidade,
  			':rua' => $this->rua,
  			':bairro' => $this->bairro,
  			':numero' => $this->numero,
  			':complemento' => $this->complemento,
  		));

	}

	public function atualizar($conn,$id) {
		$stmt = $conn->prepare('UPDATE endereco SET usuario_id=:usuario_id, cep=:cep, uf=:uf, cidade=:cidade, rua=:rua,
			bairro=:bairro, numero=:numero, complemento=:complemento WHERE 
			id=:id');
  		$stmt->execute(array(
  			':usuario_id' => $this->usuario_id,
  			':cep' => $this->cep,
  			':uf' => $this->uf,
  			':cidade' => $this->cidade,
  			':rua' => $this->rua,
  			':bairro' => $this->bairro,
  			':numero' => $this->numero,
  			':complemento' => $this->complemento,
  			':id' => $id
  		));

	}

	public function deletar($conn,$id) {
		$stmt = $conn->prepare('DELETE FROM endereco WHERE id=:id');
		$stmt->execute(array(
			':id' => $id


		));



	}
}