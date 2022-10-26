tinymce.init({
  selector: 'textarea#default'
});


function exibirId(id) {
  console.log(id)
}

$(document).ready(function () {
  $('#textForm').submit(function (e) {
    //e.preventDefault()
    var responsavel = $('#userID').val();
    var id_chamado = $('#id_chamado').val();
    var comentario = $('#default').val();
    if (!comentario) {
      $('#alertDanger').css('display', 'block');
      $('#alertDanger').html("<p>Nenhum comentário a ser adicionado!</p>")
      setTimeout(function () {
        $('#alertDanger').fadeOut('slow')
      }, 3000)
    } else {
      $.ajax({
        url: 'teste.php',
        method: 'POST',
        data: { responsavel: responsavel, id_chamado: id_chamado, comment: comentario },
        dataType: 'json',

        error: function (data) {
          $('#alertDanger').css('display', 'block');
          $('#alertDanger').html(
            'Erro ao salvar o comentário!'
          )
          setTimeout(function () {
            $('#alert').fadeOut('slow')
          }, 3000)
        },
        success: function (data) {
          $('#alert').css('display', 'block');
          $('#alert').html(data)
          setTimeout(function () {
            $('#alert').fadeOut('slow')
          }, 3000)
        }
      }).done(function (resultado) {

        console.log(resultado)
        getComments()

      })
    }


  })
})

function getComments() {
  $.ajax({
    url: 'seleciona.php',
    method: 'GET',
    dataType: 'json'
  }).done(function (resultado) {
    console.log(resultado)
    if (!resultado.length == 0) {
      $('.box_comment').css('display','block')
      for (var i = 0; i < resultado.length; i++) {
        $('.box_comment').prepend('<div class="card"><div class="card-header">' + resultado[i].nomeUsuario + '</div><div class="card-body"><blockquote class="blockquote mb-0"><p>' + resultado[i].comentario + '</p></footer></blockquote></div></div>')
      }
    }
  })
}

getComments();