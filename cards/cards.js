

$(window).on('load', function () {
  $(".loading").fadeOut('slow')
})

function getTickets() {
  $.ajax({
    url: '../listagem.php',
    method: 'GET',
    dataType: 'json'
  }).done(function (resultado) {
    console.log(resultado)
    if (resultado.length > 0) {
      $('#emAtendimentoEquipe').prepend('<p><i class="fa-solid fa-headphones"></i>&nbsp Tickets em atendimento ' + resultado.length + '</p>')
      if (resultado.length == 0) {
        $("#animation").css('display', 'block')
      }
      for (var i = 0; i < resultado.length; i++) {
        var data = resultado[i].data_cadastro
        var dataFormatada = new Date(data)
        let dataFormatada2 = ((dataFormatada.getDate())) + "/" + ((dataFormatada.getMonth() + 1)) + "/" + dataFormatada.getFullYear();
        console.log(dataFormatada2);

        //         // $('.atendimento-cards').prepend('<div class="card" id="cadKanban"><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'"><h5 class="card-header">'+resultado[i].envolvido+'<div><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'">SD-'+resultado[i].id_chamado+'</a></a></div>'+'</h5><h6 class="mb-4 text-muted">'+resultado[i].cliente+'<br>'+resultado[i].tipo_chamado+'</h6><div class="card-body"><h6 class="text-muted">'+resultado[i].resumo+'</h6></div>')

        $('#tabelaConteudo').prepend('<tr><td><a class="btn btn-outline" style="color: black;" href="../ticket/ticket.php?id_chamado=' + resultado[i].id_chamado +'">SD - ' + resultado[i].id_chamado + '</td><td>' + resultado[i].cliente +'<td>'+resultado[i].envolvido+'</td>' +'</td><td>' + resultado[i].resumo + '</td><td>' +  dataFormatada2 + '</td></td></tr>')
      }
    }
  })
}

getTickets()

function buscarDadosClientes() {
  var idCliente = $("#optionIdCliente").val()
  console.log(idCliente)
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

