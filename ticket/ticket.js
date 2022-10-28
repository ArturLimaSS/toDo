// tinymce.init({
//   selector: 'textarea#default'
// });

tinymce.init({
  selector: 'textarea#default',
  menubar: false,
  plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
  toolbar: 'bold italic underline strikethrough | link image media table mergetags | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | removeformat',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  entity_enconding: 'raw',

  mergetags_list: [
    { value: 'First.Name', title: 'First Name' },
    { value: 'Email', title: 'Email' },
  ]
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
        data: {
          responsavel: responsavel,
          id_chamado: id_chamado,
          comment: comentario
        },
        dataType: 'json',
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
    $('.box_comment').css('display', 'block')
    for (var i = 0; i < resultado.length; i++) {
      $('.box_comment').prepend('<div class="card" style="margin-top:5px;"><div class="card-header">' + resultado[i].nomeUsuario + '</div><div class="card-body" style="font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;"><blockquote class="blockquote mb-0"><p>' + resultado[i].comentario + '</p></footer></blockquote></div></div>')
    }
  })
}

getComments();

function mostrarTextArea() {
  $("#textForm").css('display', 'block')
  $("#bodyContent").css('transform','translate(0,-316.5%)')
}