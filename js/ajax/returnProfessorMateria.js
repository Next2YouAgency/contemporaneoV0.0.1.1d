/** * Função para criar um objeto XMLHTTPRequest */
function CriaRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (IEAtual) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (IEAntigo) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (falha) {
                request = false;
            }
        }
    }
    if (!request)
        alert("Verifique sua versão do navegador!");
    else
        return request;
}
function returnProfessores() {
    // Declaração de Variáveis
    var materia_selecionada = document.getElementById("materia").value;
    var inserir_elemento = document.getElementById("professor");
    var xmlreq = CriaRequest();
    // Exibi a imagem de progresso
    inserir_elemento.innerHTML = '<input type="text" name="professor" id="professor" class="form-control" value="Carregando..." disabled>';
    // Iniciar uma requisição
    xmlreq.open("GET", "pages/requisicao-js/returnProfessor.php?MateriaSelecionada=" + materia_selecionada, true);
    // Atribui uma função para ser executada sempre que houver uma mudança de Dado
    xmlreq.onreadystatechange = function () {
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
        if (xmlreq.readyState == 4) {
            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                inserir_elemento.innerHTML = xmlreq.responseText;
            } else {
                inserir_elemento.innerHTML = "Erro: " + xmlreq.statusText;
            }
        }
    };
    xmlreq.send(null);
}