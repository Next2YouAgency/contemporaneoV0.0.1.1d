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
function buscarFoto() {
    // Declaração de Variáveis
    var campoUsuario = document.getElementById("usuario").value;
    var fotoBuscada = document.getElementById("fotoBuscada");
    var xmlreq = CriaRequest();
    // Exibi a imagem de progresso
    fotoBuscada.innerHTML = '<img src="img/ajax-loader.gif"  class="img-responsive" style="margin: 100px auto">';
    // Iniciar uma requisição
    xmlreq.open("GET", "pages/requisicao-js/load-photo.php?Load=" + campoUsuario, true);
    // Atribui uma função para ser executada sempre que houver uma mudança de Dado
    xmlreq.onreadystatechange = function () {
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
        if (xmlreq.readyState == 4) {
            // Verifica se o arquivo foi encontrado com sucesso
            if (xmlreq.status == 200) {
                fotoBuscada.innerHTML = xmlreq.responseText;
            } else {
                inserir_pagina.innerHTML = "Erro: " + xmlreq.statusText;
            }
        }
    };
    xmlreq.send(null);
}