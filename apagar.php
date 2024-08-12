<?php

include_once "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)) {
  $query_associado = "DELETE FROM associados WHERE id=:id";
$result_associado = $conn->prepare($query_associado);
$result_associado->bindParam(':id', $id);
if($result_associado->execute()) {
  $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Associado apagado com sucesso!</div"];
}else {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Falha ao apagar associado!</div"];
}
} else {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Nenhum associado encontrado.</div"];
}

echo json_encode($retorna);
