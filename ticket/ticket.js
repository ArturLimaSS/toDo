$(window).on('load', function(){
  $(".loading").fadeOut('slow')
})

$(document).ready(function enviaId() {
  var id_chamado_u = $("#id_chamado").val()
  if (id_chamado_u) {
    console.log(id_chamado_u)
    $.ajax({
      url: 'seleciona.php',
      method: 'POST',
      data: { id_chamado: id_chamado_u },
      dataType: 'json',
      success: console.log('Deu bom também')
    }).done(function (resultado) {
      console.log(resultado)
      if (resultado.length > 0) {
        $("#nenhumComentario").css('display', 'none')
      } else {
        $("#nenhumComentario").css('display', 'block')
      }
      for (var i = 0; i < resultado.length; i++) {
        $('.box_comment').prepend('<div class="card" id="cardComentario" style="font-size: 78%; margin-top:5px;"><div class="card-header">' + resultado[i].nomeUsuario + '</div><div class="card-body""><blockquote class="blockquote mb-0"><p>' + resultado[i].comentario + '</p></footer></blockquote></div></div>')
      }
    })
  } else {
    console.log('Deu ruim')
  }
}
)
// tinymce.init({
//   selector: 'textarea#default'
// });

tinymce.init({
  selector: 'textarea#default',
  plugins: [
    'table', 'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
    'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
    'table', 'emoticons', 'template', 'help'
  ],
  toolbar: ' undo redo | styles | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | table | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | help',
  menu: {
    favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
  },
  fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
  content_style: "body { font-size: 10pt; }",
  menubar: 'favs file edit view insert format tools table help',
});

// tinymce.init({
//   selector: 'textarea#default',
//   menubar: false,
//   plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
//   toolbar: 'bold italic underline strikethrough | link image media table mergetags | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | removeformat',
//   tinycomments_mode: 'embedded',
//   tinycomments_author: 'Author name',
//   entity_enconding: 'raw',

//   mergetags_list: [
//     { value: 'First.Name', title: 'First Name' },
//     { value: 'Email', title: 'Email' },
//   ]
// });

$(document).ready(function () {
  $('#textForm').submit(function (e) {
    //e.preventDefault()
    var responsavel = $('#userID').val();
    var id_chamado = $('#id_chamado').val();
    var comentario = $('#default').val();
    var assinaturaVal = $("#assinaturaVal");
    console.log(assinaturaVal)
    if (!comentario) {
      $('#alertDanger').css('display', 'block');
      $('#alertDanger').html("<p>Nenhum texto a ser adicionado!</p>")
      setTimeout(function () {
        $('#alertDanger').fadeOut('slow')
      }, 3000)
    } else if (comentario == assinaturaVal) {
      $('#alertDanger').css('display', 'block');
      $('#alertDanger').html("<p>Nenhum texto a ser adicionado!</p>")
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

function mostrarTextArea() {
  $("#textForm").css('display', 'block')
  $("#nenhumComentario").css('display', 'none')
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

$(document).ready(function(){
  var id_tipo = $("#selecionaTipo").val();
  console.log(id_tipo)
  $("#tituloUrgencia").html('')
  $.ajax({
    url: '../cadastros/selectTipoChamado.php',
    method: "POST",
    dataType: "JSON",
    data: {id_tipo : id_tipo},
    success: function(data){
      for(let i = 0; i < data.length; i++){
        $("#tituloUrgencia").prepend('<p class="form-control '+ data[i].color +'">' + data[i].urgencia + '  ' + data[i].prazo + ' HORAS '+ '</p>')
      }
    }
  })
})

function selectTipo(){
  var id_tipo = $("#selecionaTipo").val();
  console.log(id_tipo)
  $("#tituloUrgencia").html('')
  $.ajax({
    url: '../cadastros/selectTipoChamado.php',
    method: "POST",
    dataType: "JSON",
    data: {id_tipo : id_tipo},
    success: function(data){
      for(let i = 0; i < data.length; i++){
        $("#tituloUrgencia").prepend('<p class="form-control '+ data[i].color +'">' + data[i].urgencia + '  ' + data[i].prazo + ' HORAS '+ '</p>')
      }
    }
  })
}