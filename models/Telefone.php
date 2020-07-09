<?php


class Telefone {
	private $usuario_id;
	private $numero;
	private $tipo;


	function __construct($usuario_id,$numero,$tipo)
	{
		$this->usuario_id = $usuario_id;
		$this->numero = $numero;
		$this->tipo = $tipo;
		
	}

	public function getUsuario_id() {
		return $this->usuario_id;
	}

	public function setUsuario_id($usuario_id){
		$this->usuario_id = $usuario_id;
	}


	public function getNumero() {
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

 	
 	public function getTipo() {
		return $this->tipo;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}


	public static function getAll($conn){
		$dados = $conn->query("SELECT * FROM telefones");
		return $dadosTelefone;
	}

	public static function find($conn,$id){
		$dadosTelefone = $conn->prepare("SELECT * FROM telefones WHERE id=:id");
		$dadosTelefone->execute(array(
			':id'=>$id
		)); 
		$dadosTelefone = $dados->fetch();
		//return $dados->fetch();
		$telefone = new Telefone($dadosTelefone['usuario_id'],$dadosTelefone['numero'],$dadosTelefone['tipo']);
		return $telefone;
	}


	public function salvar($conn){
		$stmt = $conn->prepare('INSERT INTO telefones (usuario_id,numero,tipo) VALUES (:usuario_id,:numero,:tipo)');
  		$stmt->execute(array(
  			':usuario_id' => $this->usuario_id,
  			':numero' => $this->numero,
  			':tipo' => $this->tipo
  		));

	}

	public function atualizar($conn,$id,$tipo) {
		$stmt = $conn->prepare('UPDATE telefones SET numero=:numero WHERE 
			usuario_id=:id and tipo = :tipo' );
  		$stmt->execute(array(
  			':id' => $id,
  			':numero' => $this->numero,
  			':tipo' => $tipo
  		));
	}

	public function deletar($conn,$id) {
		$stmt = $conn->prepare('DELETE FROM telefones WHERE id=:id');
		$stmt->execute(array(
			':id' => $id


		));



	}
}
