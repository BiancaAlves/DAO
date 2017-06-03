<?php 

/*

CRIANDO A CLASSE USUÁRIO

Essa é a classe da tabela já existente no Banco de Dados dbphp7. Serão criados os atributos das colulas e métodos para acessa-los.

*/

class Usuario {

	//Atributos
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	//Métodos Getters e Setters
	public function getIdUsuario (){
		return $this->idusuario;
	}

	public function getDesLogin (){
		return $this->deslogin;
	}

	public function getDesSenha (){
		return $this->dessenha;
	}

	public function getDtCadastro (){
		return $this->dtcadastro;
	}

	public function setIdUsuario($value){
		$this->idusuario = $value;
	}

	public function setDesLogin($value){
		$this->deslogin = $value;
	}

	public function setDesSenha($value){
		$this->dessenha = $value;
	}

	public function setDtCadastro($value){
		$this->dtcadastro = $value;
	}

	//Outros métodos

	//Abaixo, um método que recebe como parâmetro a ID de um usuário e faz um SELECT dos outros atributos daquele ID. Este será o método responsável por tirar os atributos do banco e colocar nos atributos da classe.

	public function loadById($id){
		//Instanciando a classe Sql
		$sql = new Sql();

		//Usando o método da classe Sql, que criamos para fazer selects
		$result = $sql->select("SELECT * FROM tb_usuario WHERE idusuario = :ID", array(
			//Lembrando de como se cria um array com referências: Usando igual e sinal de maior.
				":ID" => $id
			));

		/*

		Esse método seleciona todas as linhas que tem um determinado idusuario, ou seja, só selecionará uma linha, pois idusuario é uma chave primária.

		Mas mesmo só selecinando uma linha, o método select() que criamos na classe Sql retornará um array de arrays, pois assim o definimos. 

		*/

		//Agora, precisamos conferir se esse SELECT realmente retornou algo. Talvez o ID pesquisado não exista. Faremos isso com um IF e usando o método ISSET (se não é nulo, retorna true)

		if (isset($result[0])){
			//Como é um array de arrays, a posição 0 desse array tem um array em cuja posição 0 está a linha que solicitamos.
			$row = $result[0];

			//Os campos encontrados serão setados nos atributos da classe
			$this->setIdUsuario($row['idusuario']);
			$this->setDesLogin($row['deslogin']);
			$this->setDesSenha($row['dessenha']);
			$this->setDtCadastro(new DateTime ($row['dtcadastro']));

			//No setDtCadastro foi usado o método DateTime para que a data venha formatada
		}
	}

	//Abaixo, criaremos o método mágico __toString. Esse método formata os atributos quando eles forem convertidos para String

	public function __toString (){
		//Neste caso, ele retornará um arquivo JSON, que conterá um array com as informações
		return json_encode(array(
			"idusuario"=>$this->getIdUsuario(),
			"deslogin"=>$this->getDesLogin(),
			"dessenha"=>$this->getDesSenha(),
			"dtcadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s")
			));
	}

}

?>