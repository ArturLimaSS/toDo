function getComments() {
    $.ajax({
        url: '../listagem.php',
        method: 'GET',
        dataType: 'json'
    }).done(function (resultado) {
        console.log(resultado)
        if (resultado.length > 0) {
            for (var i = 0; i < resultado.length; i++) {
                $('.atendimento-cards').prepend('<div class="card"><h5 class="card-header">'+resultado[i].envolvido+'</h5><h6 class="mb-4 text-muted">'+resultado[i].cliente+'<div class="card-body"><h5 class="card-title">'+resultado[i].resumo+'</h5><p class="card-text">'+resultado[i].descricao+'</p><a href="#" class="btn btn-primary">Abrir ticket</a></div>')
            }
        }
    })
}

getComments()