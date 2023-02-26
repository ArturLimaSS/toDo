

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
      $('#emAtendimentoEquipe').prepend('0 ABERTOS')
    } else if (resultado.length > 0) {
      var countTipoChamado = {};
      for (var i = 0; i < resultado.length; i++) {
        if (countTipoChamado[resultado[i].id_urgencia] === undefined) {
          countTipoChamado[resultado[i].id_urgencia] = 1;
        } else {
          countTipoChamado[resultado[i].id_urgencia]++;
        }
      }
      const tipoParaElemento = {
        1: '#indicador_urgente_ativos',
        2: '#indicador_muito_alta_ativos',
        3: '#indicador_alta_ativos',
        4: '#indicador_media_ativos',
        5: '#indicador_baixa_ativos',
        6: '#indicador_muito_baixa_ativos',
      };
      
      for (let tipo in countTipoChamado) {
        const valor = countTipoChamado[tipo] ?? 0;
        const elemento = $(tipoParaElemento[tipo]);
        elemento.text(valor);
      }


      var emAtendimento = '<a style="color: white;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"aria-controls="multiCollapseExample1">'
      emAtendimento += resultado.length + ' Abertos</a>'
      $('#emAtendimentoEquipe').prepend(emAtendimento)

      for (var i = 0; i < resultado.length; i++) {
        console.log(resultado[i].indicador_prioridade)
        var data = resultado[i].data_cadastro
        var dataFormatada = new Date(data)
        let dataFormatada2 = ((dataFormatada.getDate().toString().padStart(2, "0"))) + "/" + (((dataFormatada.getMonth() + 1).toString().padStart(2, "0"))) + "/" + dataFormatada.getFullYear();
        console.log(dataFormatada2);


        //         // $('.atendimento-cards').prepend('<div class="card" id="cadKanban"><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'"><h5 class="card-header">'+resultado[i].envolvido+'<div><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'">SD-'+resultado[i].id_chamado+'</a></a></div>'+'</h5><h6 class="mb-4 text-muted">'+resultado[i].cliente+'<br>'+resultado[i].tipo_chamado+'</h6><div class="card-body"><h6 class="text-muted">'+resultado[i].resumo+'</h6></div>')

        $('#tabelaConteudo').prepend(`<a href="../ticket/ticket.php?id_chamado=` + resultado[i].id_chamado + `">
        <li class="list-group-item" style="padding: 15px 20px 12px 20px" data-toggle="" data-target="">
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

$(document).ready(function () {
  $.ajax({
    url: '../listagem_arquivo.php',
    method: 'GET',
    dataType: 'json'
  }).done(function (resultado) {
    console.log(resultado)
    if (resultado == 0) {
      $('#quantidadeArquivado').prepend('0 Fechados')
    } else if (resultado.length > 0) {
      var countTipoChamado = {};

      for (var i = 0; i < resultado.length; i++) {
        // verificar se o tipo de chamado já existe no objeto
        if (countTipoChamado[resultado[i].id_urgencia] === undefined) {
          // se não existe, adicionar o tipo de chamado ao objeto e definir a contagem como 1
          countTipoChamado[resultado[i].id_urgencia] = 1;
        } else {
          // se já existe, incrementar a contagem do tipo de chamado
          countTipoChamado[resultado[i].id_urgencia]++;
        }
      }

      const tipoParaElemento = {
        1: '#indicador_urgente',
        2: '#indicador_muito_alta',
        3: '#indicador_alta',
        4: '#indicador_media',
        5: '#indicador_baixa',
        6: '#indicador_muito_baixa',
      };
      
      for (let tipo in countTipoChamado) {
        const valor = countTipoChamado[tipo] ?? 0;
        const elemento = $(tipoParaElemento[tipo]);
        elemento.text(valor);
      }
      

      // for (var tipo in countTipoChamado) {
      //   if (tipo == 1) {
      //     if (!countTipoChamado[tipo]) { $('#indicador_urgente').append('0') } else {
      //       $('#indicador_urgente').append(countTipoChamado[tipo]);
      //     }
      //   }
      //   else if (tipo == 2) {
      //     if (!countTipoChamado[tipo]) { $('#indicador_media').append('0') } else {
      //       $('#indicador_media').append(countTipoChamado[tipo]);
      //     }
      //   }
      //   else if (tipo == 3) {
      //     if (!countTipoChamado[tipo]) { $('#indicador_alta2').append('0') } else {
      //       $('#indicador_alta2').append(countTipoChamado[tipo]);
      //     }
      //   }
      //   else if (tipo == 4) {
      //     if (!countTipoChamado[tipo]) { $('#indicador_alta1').append('0') } else {
      //       $('#indicador_alta1').append(countTipoChamado[tipo]);
      //     }
      //   }
      //   else if (tipo == 5) {
      //     if (!countTipoChamado[tipo]) { $('#indicador_baixa').append('0') } else {
      //       $('#indicador_baixa').append(countTipoChamado[tipo]);
      //     } s
      //   }
      // }
      var emAtendimento = '<a style="color: white;" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"aria-controls="multiCollapseExample1">'
      emAtendimento += resultado.length + ' Fechados</a>'
      $('#quantidadeArquivado').prepend(emAtendimento)

      for (var i = 0; i < resultado.length; i++) {
        console.log(resultado[i].indicador_prioridade)
        var data = resultado[i].data_cadastro
        var dataFormatada = new Date(data)
        let dataFormatada2 = ((dataFormatada.getDate().toString().padStart(2, "0"))) + "/" + (((dataFormatada.getMonth() + 1).toString().padStart(2, "0"))) + "/" + dataFormatada.getFullYear();
        console.log(dataFormatada2);


        //         // $('.atendimento-cards').prepend('<div class="card" id="cadKanban"><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'"><h5 class="card-header">'+resultado[i].envolvido+'<div><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'">SD-'+resultado[i].id_chamado+'</a></a></div>'+'</h5><h6 class="mb-4 text-muted">'+resultado[i].cliente+'<br>'+resultado[i].tipo_chamado+'</h6><div class="card-body"><h6 class="text-muted">'+resultado[i].resumo+'</h6></div>')

        $('#tabelaArquivado').prepend(`<a href="../ticket/ticket.php?id_chamado=` + resultado[i].id_chamado + `">
        <li class="list-group-item" style="padding: 15px 20px 12px 20px" data-toggle="" data-target="">
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



function alternarListagem(elementId) {
  let listagem1 = $("#listCard1")
  let listagem2 = $("#listCard2")
  let elementoClicado = $("#" + elementId)

  if (elementoClicado.is(listagem1)) {
    listagem1.css('display', 'block')
    listagem2.css('display', 'none')
    $('#emAtendimentoEquipe').addClass('active')
    $('#quantidadeArquivado').removeClass('active')
    $('.indicadorAtivos').css('display', 'block')
    $('.indicadorInativos').css('display', 'none')
  } else if (elementoClicado.is(listagem2)) {
    listagem1.css('display', 'none')
    listagem2.css('display', 'block')
    $('#emAtendimentoEquipe').removeClass('active')
    $('#quantidadeArquivado').addClass('active')
    $('.indicadorAtivos').css('display', 'none')
    $('.indicadorInativos').css('display', 'block')
  }
}

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

