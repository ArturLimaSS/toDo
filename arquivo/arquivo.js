

$(window).on('load', function () {
    $(".loading").fadeOut('fast')
  })
  
  $(document).ready(function() {
    $.ajax({
      url: '../listagem_arquivo.php',
      method: 'GET',
      dataType: 'json'
    }).done(function (resultado) {
      console.log(resultado)
      if (resultado == 0) {
        $('#emAtendimentoEquipe').prepend('<p><i class="fa-solid fa-headphones"></i>&nbsp Tickets em atendimento 0 </p>')
      } else if (resultado.length > 0) {
        var emAtendimento = '<a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"aria-controls="multiCollapseExample1">'
          emAtendimento += '<i class="fa-solid fa-headphones"></i>&nbsp Tickets Arquivados ' + resultado.length + '</a>'
        $('#emAtendimentoEquipe').prepend(emAtendimento)
  
        for (var i = 0; i < resultado.length; i++) {
          var data = resultado[i].data_cadastro
          var dataFormatada = new Date(data)
          let dataFormatada2 = ((dataFormatada.getDate().toString().padStart(2,"0"))) + "/" + (((dataFormatada.getMonth()+1).toString().padStart(2,"0"))) + "/" + dataFormatada.getFullYear();
          console.log(dataFormatada2);
  
  
          //         // $('.atendimento-cards').prepend('<div class="card" id="cadKanban"><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'"><h5 class="card-header">'+resultado[i].envolvido+'<div><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'">SD-'+resultado[i].id_chamado+'</a></a></div>'+'</h5><h6 class="mb-4 text-muted">'+resultado[i].cliente+'<br>'+resultado[i].tipo_chamado+'</h6><div class="card-body"><h6 class="text-muted">'+resultado[i].resumo+'</h6></div>')
  
          $('#tabelaConteudo').prepend('<tr><td><a class="btn btn-outline" style="color: black;" href="../ticket/ticket.php?id_chamado=' + resultado[i].id_chamado + '">SD - ' + resultado[i].id_chamado + '</td><td>' + resultado[i].cliente + '<td>' + resultado[i].envolvido + '</td>' + '</td><td>' + resultado[i].resumo + '</td><td>' + resultado[i].responsavel + '</td><td>' + dataFormatada2 + '</td></td></tr>')
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
  
  