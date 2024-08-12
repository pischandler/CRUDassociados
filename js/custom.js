const tbody = document.querySelector(".listar-associados");
const cadForm = document.getElementById("cad-associado-form");
const editForm = document.getElementById("edit-associado-form");
const msgAlerta = document.getElementById("msgAlerta"); 
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit");
const cadModal = new bootstrap.Modal(document.getElementById("cadAssociadoModal"));

const listarAssociados = async (pagina) => {
  const dados = await fetch("./list.php?pagina=" + pagina);
  const resposta = await dados.text();
  tbody.innerHTML = resposta;
}

listarAssociados(1);

cadForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  
  document.getElementById("cad-associado-btn").value = "Salvando..."

if(document.getElementById("nome").value === "") {
  msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo nome!</div>"
}else if(document.getElementById("email").value === "") {
  msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo e-mail!</div>"
}else {
  const dadosForm = new FormData(cadForm);
  dadosForm.append("add", 1);

  const dados = await fetch("cadastrar.php", {
    method: "POST",
    body: dadosForm,
  });

  const resposta = await dados.json();
  if (resposta['erro']) {
    msgAlertaErroCad.innerHTML = resposta['msg'];
  } else {
    msgAlerta.innerHTML = resposta['msg'];
    cadForm.reset();
    cadModal.hide();
    listarAssociados(1);
  }

}

  document.getElementById("cad-associado-btn").value = "Cadastrar"
});

async function visAssociado(id) {
  //console.log("Acessou: " + id)
 const dados = await fetch('visualizar.php?id=' + id);

  const resposta = await dados.json();
  //console.log(resposta);

  if(resposta['erro']){
    msgAlerta.innerHTML = resposta['msg'];
  }else{
    const visModal = new bootstrap.Modal(document.getElementById("visAssociadoModal"));
    visModal.show();

    document.getElementById("visualizar_id").innerHTML = resposta['dados'].id;
    document.getElementById("visualizar_nome").innerHTML = resposta['dados'].nome;
    document.getElementById("visualizar_email").innerHTML = resposta['dados'].email;
  }
}

async function editAssociadoDados(id){
  msgAlertaErroEdit.innerHTML = "";

  const dados = await fetch('visualizar.php?id=' + id);
  const resposta = await dados.json();
  //console.log(resposta);

  if(resposta['erro']){
    msgAlerta.innerHTML = resposta['msg'];
  }else{
    const editModal = new bootstrap.Modal(document.getElementById("editAssociadoModal"));
    editModal.show();
    document.getElementById("edit_id").value = resposta['dados'].id;
    document.getElementById("edit_nome").value = resposta['dados'].nome;
    document.getElementById("edit_email").value = resposta['dados'].email;
  }
}

editForm.addEventListener("submit", async (e) => {
  e.preventDefault();

    document.getElementById("edit-associado-btn").value = "Salvando...";

  const dadosForm = new FormData(editForm);
  //console.log(dadosForm);
  /*for (var dadosFormEdit of dadosForm.entries()) {
    console.log(dadosFormEdit[0] + "-" + dadosFormEdit[1]);
  }*/

 const dados = await fetch("editar.php", {
    method: "POST",
    body:dadosForm
  });

  const resposta = await dados.json();
  //console.log(resposta);

  if(resposta['erro']) {
    msgAlertaErroEdit.innerHTML = resposta['msg'];
  }else{
    msgAlertaErroEdit.innerHTML = resposta['msg'];
    listarAssociados(1);
  }

  document.getElementById("edit-associado-btn").value = "Salvar";
});

async function apagarAssociadoDados(id) {

  var confirmar = confirm("Tem certeza que deseja excluir o associado selecionado?");
if(confirmar === true){
  const dados = await fetch('apagar.php?id=' + id);
  const resposta = await dados.json();
  if(resposta['erro']){
     msgAlerta.innerHTML = resposta['msg'];
  }else{
   msgAlerta.innerHTML = resposta['msg'];
   listarAssociados(1);
  }
}
}



