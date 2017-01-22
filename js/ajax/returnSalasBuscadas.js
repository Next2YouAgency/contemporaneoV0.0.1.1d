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
function returnSalas() {
    function dataAtualFormatada() {
        var data = new Date($("#data").val());
        
        var dia = data.getUTCDate(data);
        var mes = data.getUTCMonth(data)+1;
        var ano = data.getFullYear(data);
        
        var dia = dia.toString();
        var mes = mes.toString();
        
        if(dia === "01" && mes === "01"){
            var ano = data.getFullYear(data)+1;
        }
        
        var tamanho_dia = dia.length;
        var tamanho_mes = mes.length;
        
        if(tamanho_dia === 1){dia = "0"+dia;}
        if(tamanho_mes === 1){mes = "0"+mes;}
        
        return dataFormato = dia+"_"+mes+"_"+ano;
        
    }
    // Declaração de Variáveis
    var data_selecionada = dataAtualFormatada();
    
    var inserir_elemento = document.getElementById("sala_de_aula");
    var xmlreq = CriaRequest();
    // Exibi a imagem de progresso
    inserir_elemento.innerHTML = '<input type="text" name="sala_de_aula" id="sala_de_aula" class="form-control" value="Carregando..." disabled>';
    // Iniciar uma requisição
    xmlreq.open("GET", "pages/requisicao-js/returnSalaDeAula.php?DataSelecionada=" + data_selecionada, true);
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