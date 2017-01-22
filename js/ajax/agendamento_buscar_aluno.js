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
function returnNomeAluno() {
    // Declaração de Variáveis
    var select_aluno = document.getElementById("matricula_aluno").value;
    var inserir_nome_aluno = document.getElementById("nome_aluno");
    var xmlreq = CriaRequest();
    // Exibi a imagem de progresso
    inserir_nome_aluno.innerHTML = '<input type="text" name="nome_aluno" id="nome_aluno" class="form-control" value="Carregando..." disabled>';
    // Iniciar uma requisição
    xmlreq.open("GET", "pages/requisicao-js/returnNome.php?SelectNome=" + select_aluno, true);
    // Atribui uma função para ser executada sempre que houver uma mudança de Dado
    xmlreq.onreadystatechange = function () {
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
        if (xmlreq.readyState == 4) {
            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                inserir_nome_aluno.innerHTML = xmlreq.responseText;
            } else {
                inserir_nome_aluno.innerHTML = "Erro: " + xmlreq.statusText;
            }
        }
    };
    xmlreq.send(null);
}