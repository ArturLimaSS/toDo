$(window).on('load', function(){
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
            for (var i = 0; i < resultado.length; i++) {
                if(!resultado[i].envolvido){
                    $('.atendimento-cards').prepend('<div class="card" id="cadKanban"><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'"><h5 class="card-header"><div><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'">SD-'+resultado[i].id_chamado+'</a></a></div>'+'</h5><h6 class="mb-4 text-muted"><br>'+resultado[i].tipo_chamado+'</h6><div class="card-body"><h5 class="card-title">'+resultado[i].resumo+'</h5><p class="card-text">'+resultado[i].descricao+'</p></div>')

                }else{
                    $('.atendimento-cards').prepend('<div class="card" id="cadKanban"><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'"><h5 class="card-header">'+resultado[i].envolvido+'<div><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'">SD-'+resultado[i].id_chamado+'</a></a></div>'+'</h5><h6 class="mb-4 text-muted">'+resultado[i].cliente+'<br>'+resultado[i].tipo_chamado+'</h6><div class="card-body"><h6 class="text-muted">'+resultado[i].resumo+'</h6></div>')
                }
            }
        }
    })
}

getTickets()

function buscarDadosClientes() {
    var idCliente = $("#optionIdCliente").val()
    console.log(idCliente)
}

function buscarDadosClientes(){
    var idCliente = $("#selectEmpresa").val()
    $("#selectEnvolvido").html('')
    console.log(idCliente)
    $.ajax({
      url: '../selectCliente.php',
      method: 'POST',
      dataType: 'JSON',
      data: {idCliente : idCliente},
      success: function(data){
        for(let i = 0; i < data.length; i++){
          let option = '<option value="'+data[i].id+'">'+data[i].nome+'</option>'
          $("#selectEnvolvido").prepend(option)
        }
      }
    })
    
  }
  