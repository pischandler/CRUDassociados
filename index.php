<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<script src="https://kit.fontawesome.com/5414af6fb5.js" crossorigin="anonymous"></script>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>CRUD - PHP FETCH</title>
</head>

<body>
  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>

        </div>
        <div>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadAssociadoModal">Cadastrar
          </button>
        </div>
      </div>
    </div>
    <hr>
    <span id="msgAlerta"></span>
    <div class="row">
      <div class="col-lg-12">

        <span class="listar-associados"></span>



      </div>
    </div>
  </div>

  <div class="modal fade" id="cadAssociadoModal" tabindex="-1" aria-labelledby="cadAssociadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cadAssociadoModalLabel">Cadastrar Associado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="cad-associado-form">
            <span id="msgAlertaErroCad"></span>
            <div class="mb-3">
              <label for="nome" class="col-form-label">Nome:</label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="Digite o nome completo">
            </div>
            <div class="mb-3">
              <label for="email" class="col-form-label">E-mail:</label>
              <input type="text" name="email" class="form-control" id="email" placeholder="Digite o seu e-mail">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <input type="submit" type="button" class="btn btn-primary" id="cad-associado-btn" value="Cadastrar" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="visAssociadoModal" tabindex="-1" aria-labelledby="visAssociadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="visAssociadoModalLabel">Detalhes do Associado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span id="msgAlertaErroVis"></span>
          <dl class="row">
            <dt class="col-sm-3">ID: </dt>
            <dd class="col-sm-9" id="visualizar_id"></dd>

            <dt class="col-sm-3">Nome: </dt>
            <dd class="col-sm-9" id="visualizar_nome"></dd>

            <dt class="col-sm-3">E-mail: </dt>
            <dd class="col-sm-9" id="visualizar_email"></dd>

          </dl>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="editAssociadoModal" tabindex="-1" aria-labelledby="editAssociadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editAssociadoModalLabel">Editar Associado</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-associado-form">
            <span id="msgAlertaErroEdit"></span>
            <input type="hidden" name="id" id="edit_id">
            <div class="mb-3">
              <label for="nome" class="col-form-label">Nome:</label>
              <input type="text" name="nome" class="form-control" id="edit_nome" placeholder="Digite o nome completo">
            </div>
            <div class="mb-3">
              <label for="email" class="col-form-label">E-mail:</label>
              <input type="text" name="email" class="form-control" id="edit_email" placeholder="Digite o seu e-mail">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <input type="submit" type="button" class="btn btn-warning" id="edit-associado-btn" value="Salvar" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/custom.js"></script>
</body>

</html>