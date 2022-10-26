tinymce.init({
  selector: 'textarea#default'
});


function exibirId(id){
  console.log(id)
}

$(document).ready(function(){
  $('#textForm').submit(function (e) {
    //e.preventDefault()
    var responsavel    = $('#userID').val();
    var id_chamado = $('#id_chamado').val();
    var comentario = $('#default').val();
  
    $.ajax({
        url: 'teste.php',
        method: 'POST',
        data: { responsavel: responsavel, id_chamado: id_chamado, comment: comentario },
        dataType: 'json',
        success: function (data) {
             $('#alert').css('display', 'block');
             $('#alert').html(data)
             setTimeout(function () {
                 $('#alert').fadeOut('slow')
             }, 3000)
         },
         error: function (data) {
             $('#alertDanger').css('display', 'block');
             $('#alertDanger').html(
                 'Erro ao salvar o comentário!'
             )
             setTimeout(function () {
                 $('#alert').fadeOut('slow')
             }, 3000)
         }
    }).done(function (resultado) {
        console.log(resultado)
      
  
    })
  })
})

function getComments() {
  $.ajax({
      url: 'seleciona.php',
      method: 'GET',
      dataType: 'json'
  }).done(function (resultado) {
      console.log(resultado)
      for (var i = 0; i < resultado.length; i++) {
           if (resultado.length > 0) {
               $('.box_comment').prepend('<div class="b_comm"><h4>'+resultado[i].nomeUsuario+'</h4><p>' + resultado[i].comentario + '</p></div>')
           } else {
               $('.box_comment').prepend('Nenhum dado encontrado!')
           }
       }
  })
}

getComments();