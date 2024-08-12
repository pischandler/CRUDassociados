<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(empty($dados['nome'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div"];

}elseif(empty($dados['email'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div"];
  
}else{
$query_associados = "INSERT INTO associados (nome, email) VALUES (:nome, :email)";
$cad_associado = $conn->prepare($query_associados);
$cad_associado->bindParam(':nome', $dados['nome']);
$cad_associado->bindParam(':email', $dados['email']);

$cad_associado->execute();
if($cad_associado->rowCount()) {
  $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Associado cadastrado com sucesso!</div"];
}else {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Falha ao cadastrar associado!</div"];
}
}

echo json_encode($retorna);
