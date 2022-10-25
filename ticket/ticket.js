tinymce.init({
  selector: 'textarea#default'
});

function enviar() {
  var texto = $("#default").val()
  console.log(texto)
}

$('#textForm').submit(function (e) {
  e.preventDefault();
  var id_chamado = $('#id_chamado').val();
  var comentario = $('#default').val();

  $.ajax({
      url: '',
      method: 'POST',
      data: { comment: comentario },
      dataType: 'json',
      // success: function (data) {
      //     $('#alert').css('display', 'block');
      //     $('#alert').html(data)
      //     setTimeout(function () {
      //         $('#alert').fadeOut('slow')
      //     }, 3000)
      // },
      // error: function (data) {
      //     $('#alertDanger').css('display', 'block');
      //     $('#alertDanger').html(
      //         'Erro ao salvar o comentário!'
      //     )
      //     setTimeout(function () {
      //         $('#alert').fadeOut('slow')
      //     }, 3000)
      // }
  }).done(function (resultado) {
      console.log(resultado)


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
               $('.box_comment').prepend('<div class="b_comm"><p>' + resultado[i].comentario + '</p></div>')
           } else {
               $('.box_comment').prepend('<div>Nenhum dado encontrado!</div>')
           }
       }
  })
}

getComments();