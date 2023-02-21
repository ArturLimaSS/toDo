

$(window).on('load', function () {
  $(".loading").fadeOut('fast')
})

$(document).ready(function () {
  $.ajax({
    url: '../listagem.php',
    method: 'GET',
    dataType: 'json'
  }).done(function (resultado) {
    console.log(resultado)
    if (resultado == 0) {
      $('#emAtendimentoEquipe').prepend('<p><i class="fa-solid fa-headphones"></i>&nbsp Tickets em atendimento 0 </p>')
    } else if (resultado.length > 0) {
      var countTipoChamado = {};

      for (var i = 0; i < resultado.length; i++) {
        // verificar se o tipo de chamado já existe no objeto
        if (countTipoChamado[resultado[i].id_tipo_chamado] === undefined) {
          // se não existe, adicionar o tipo de chamado ao objeto e definir a contagem como 1
          countTipoChamado[resultado[i].id_tipo_chamado] = 1;
        } else {
          // se já existe, incrementar a contagem do tipo de chamado
          countTipoChamado[resultado[i].id_tipo_chamado]++;
        }
      }
      for (var tipo in countTipoChamado) {
        console.log(tipo)
        if(tipo == 1){
          $('#indicador_urgente').append(countTipoChamado[tipo]);
        }
        else if(tipo == 2){
          $('#indicador_media').append(countTipoChamado[tipo]);
        }
        else if(tipo == 3){
          $('#indicador_alta2').append(countTipoChamado[tipo]);
        }
        else if(tipo == 4){
          $('#indicador_alta1').append(countTipoChamado[tipo]);
        }
        else if(tipo == 5){
          $('#indicador_baixa').append(countTipoChamado[tipo]);
        }
      
    }
      var emAtendimento = '<a style="color: white;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"aria-controls="multiCollapseExample1">'
      emAtendimento += resultado.length + ' Abertos</a>'
      $('#emAtendimentoEquipe').prepend(emAtendimento)

      for (var i = 0; i < resultado.length; i++) {
        var data = resultado[i].data_cadastro
        var dataFormatada = new Date(data)
        let dataFormatada2 = ((dataFormatada.getDate().toString().padStart(2, "0"))) + "/" + (((dataFormatada.getMonth() + 1).toString().padStart(2, "0"))) + "/" + dataFormatada.getFullYear();
        console.log(dataFormatada2);


        //         // $('.atendimento-cards').prepend('<div class="card" id="cadKanban"><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'"><h5 class="card-header">'+resultado[i].envolvido+'<div><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'">SD-'+resultado[i].id_chamado+'</a></a></div>'+'</h5><h6 class="mb-4 text-muted">'+resultado[i].cliente+'<br>'+resultado[i].tipo_chamado+'</h6><div class="card-body"><h6 class="text-muted">'+resultado[i].resumo+'</h6></div>')

        $('#tabelaConteudo').prepend(`<a href="../ticket/ticket.php?id_chamado=` + resultado[i].id_chamado + `">
        <li class="list-group-item">
          <div class="media">
              <div class="media-body">
                  <strong>` + resultado[i].resumo.toUpperCase() + `</strong> ` + resultado[i].prioridade + `
                  <span class="float-right"><strong>SD - ` + resultado[i].id_chamado + `  </strong></span>
                  <div class="info"><p> Responsável: ` + resultado[i].responsavel + ` / Criado em: ` + dataFormatada2 + ` / Empresa: ` + resultado[i].cliente + ` / Solicitante: ` + resultado[i].envolvido + `</p></div>
              </div>
          </div>
        </li>`)
      }
    }
  })
}
)

function buscarDadosClientes() {
  var idCliente = $("#selectEmpresa").val()
  $("#selectEnvolvido").html('')
  console.log(idCliente)
  $.ajax({
    url: '../selectCliente.php',
    method: 'POST',
    dataType: 'JSON',
    data: { idCliente: idCliente },
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        let option = '<option value="' + data[i].id + '">' + data[i].nome + '</option>'
        $("#selectEnvolvido").prepend(option)
      }
    }
  })

}

