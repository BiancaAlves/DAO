<meta charset="UTF-8">

<?php 

require_once("config.php");

//$sql = new Sql();

//Agora fica muito mais fácil executar comandos no banco:
//$usuarios = $sql->select("SELECT * FROM tb_usuario");

//echo json_encode($usuarios);

$fulano = new Usuario();

//Executaremos o método que retorna um usuário cujo ID é passado por parâmetro
//$fulano->loadById(6);

//Abaixo, colocamos dentro do json_encode o resultado do método estático getList, que retorna uma lista com todos os dados da tabela. Lembrando a sintaxe para chamar métodos estáticos:
//NomeDaClasse::Metodo()

//echo json_encode(Usuario::getList());

//Abaixo executaremos um método que carrega uma lista de logins semelhantes ao login pesquisado (passado como parâmetro)

//echo json_encode(Usuario::search("e"));

//Abaixo, executaremos o método login: Ele recebe como parâmetro um usuário e senha, verifica se tem no banco e, se tiver, ele carrega os valores nos atributos do objeto. Se ele não encontrar, exibe uma mensagem de erro.
$usuario = new Usuario();
$usuario->login("Ana", "3ic92l");

echo $usuario;

?>