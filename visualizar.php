<?php
include_once "conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $query_associados = "SELECT id, nome, email FROM associados WHERE id =:id LIMIT 1";
    $result_associado = $conn->prepare($query_associados);
    $result_associado->bindParam(':id', $id);
    $result_associado->execute();

    $row_associado = $result_associado->fetch(PDO::FETCH_ASSOC);

    $dados = "Casa:" . $id;

    $retorna = ['erro' => false, 'dados' => $row_associado];
 
} else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum usuário encontrado!</div"];
}
echo json_encode($retorna);