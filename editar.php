<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if(empty($dados['id'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente novamente mais tarde.</div"];

} elseif(empty($dados['nome'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div"];

} elseif(empty($dados['email'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div"];
  
} else{
  $query_associado = "UPDATE associados SET nome=:nome, email=:email WHERE id=:id";
$edit_associado = $conn->prepare($query_associado);
$edit_associado->bindParam(':nome', $dados['nome']);
$edit_associado->bindParam(':email', $dados['email']);
$edit_associado->bindParam(':id', $dados['id']);
if($edit_associado->execute()) {
  $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Associado editado com sucesso!</div"];
}else {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Falha ao editar associado!</div"];
}
}

echo json_encode($retorna);
