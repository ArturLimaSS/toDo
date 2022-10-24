function getTickets() {
    $.ajax({
        url: '../listagem.php',
        method: 'GET',
        dataType: 'json'
    }).done(function (resultado) {
        console.log(resultado)
        if (resultado.length > 0) {
            for (var i = 0; i < resultado.length; i++) {
                $('.atendimento-cards').prepend('<div class="card" id="cadKanban"><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'"><h5 class="card-header">'+resultado[i].envolvido+'<div><a href="../ticket/ticket.php?id_chamado='+resultado[i].id_chamado+'">SD-'+resultado[i].id_chamado+'</a></a></div>'+'</h5><h6 class="mb-4 text-muted">'+resultado[i].cliente+'<br>'+resultado[i].tipo_chamado+'</h6><div class="card-body"><h5 class="card-title">'+resultado[i].resumo+'</h5><p class="card-text">'+resultado[i].descricao+'</p></div>')
            }
        }
    })
}

getTickets()