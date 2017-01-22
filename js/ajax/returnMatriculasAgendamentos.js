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
function returnMatriculaNova() {
    // Declaração de Variáveis
    var btn_clicado = document.getElementById("sem_matricula").value;
    var inserir_elemento = document.getElementById("returnMatricula");
    var xmlreq = CriaRequest();
    // Exibi a imagem de progresso
    inserir_elemento.innerHTML = '<div class="col-md-12 text-center" style="padding-top:25px;padding-bottom:25px"><img src="img/ajax-loader.gif"></div>';
    // Iniciar uma requisição
    xmlreq.open("GET", "pages/requisicao-js/returnMatricula.php?BtnClicado=" + btn_clicado, true);
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

function returnMatriculado() {
    // Declaração de Variáveis
    var btn_clicado = document.getElementById("com_matricula").value;
    var inserir_elemento = document.getElementById("returnMatricula");
    var xmlreq = CriaRequest();
    // Exibi a imagem de progresso
    inserir_elemento.innerHTML = '<div class="col-md-12 text-center" style="padding-top:25px;padding-bottom:25px"><img src="img/ajax-loader.gif"></div>';
    // Iniciar uma requisição
    xmlreq.open("GET", "pages/requisicao-js/returnMatriculado.php?BtnClicado=" + btn_clicado, true);
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