$(window).on('load', function () {
  $(".loading").fadeOut('fast')
})

const phoneMask = (value) => {
  if (!value) return ""
  value = value.toString().replace(/\D/g, '')
  value = value.toString().replace(/(\d{2})(\d)/, "($1) $2")
  value = value.toString().replace(/(\d)(\d{4})$/, "$1-$2")
  document.write(value)
}

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
        const dataHoraSql = resultado[i].cadastro;

        // Crie um objeto Date a partir da string do SQL
        const dataHora = new Date(dataHoraSql);

        // Use os métodos de formatação de data e hora do JavaScript para formatar a data
        const dia = dataHora.getDate().toString().padStart(2, "0"); // obtém o dia do mês e adiciona um zero à esquerda, se necessário
        const mes = (dataHora.getMonth() + 1).toString().padStart(2, "0"); // obtém o mês e adiciona um zero à esquerda, se necessário (o método getMonth() retorna um valor entre 0 e 11, por isso adicionamos 1)
        const ano = dataHora.getFullYear().toString(); // obtém o ano como uma string de 4 dígitos
        const hora = dataHora.getHours().toString().padStart(2, "0"); // obtém a hora e adiciona um zero à esquerda, se necessário
        const minuto = dataHora.getMinutes().toString().padStart(2, "0"); // obtém o minuto e adiciona um zero à esquerda, se necessário
        const segundo = dataHora.getSeconds().toString().padStart(2, "0"); // obtém o segundo e adiciona um zero à esquerda, se necessário
        const dataHoraFormatada = `${dia}/${mes}/${ano} ${hora}:${minuto}:${segundo}`; // combina os valores do dia, mês, ano, hora, minuto e segundo em uma string formatada

        console.log(dataHoraFormatada);
        $('.box_comment').prepend(`<br><div class="media" style="box-shadow: 0px 10px 15px -3px rgba(0,0,0,0.15);">
        <hr>
        <img src="../` + resultado[i].foto + `" class="mr-3 rounded-circle" width="5%" alt="Foto do usuário">
        <div class="media-body">
          <h5 class="mt-0">` + resultado[i].nomeUsuario + `</h5>
          <span class="data-cadastro">` + dataHoraFormatada + `</span>
          <hr>
          <p>` + resultado[i].comentario + `</p>
        </div>
      </div><br>`)
        // $('.box_comment').prepend('<div class="card" id="cardComentario" style="font-size: 78%; margin-top:5px;"><div class="card-header">' + resultado[i].nomeUsuario + '</div><div class="card-body""><blockquote class="blockquote mb-0"><p>' + resultado[i].comentario + '</p></footer></blockquote></div></div>')
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



//PEGA COMENTÁRIOS

$(document).ready(function () {
  $('#textForm').submit(function (e) {
    e.preventDefault()
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
          console.log('Deu bom')
          $("#textForm").css('display', 'block')
          $("#textForm").toggle("fadeInDown")
          $("#mostrarTextArea").css('display', 'none')
          $("#cancelaComentario").css('display', 'none')
          $('#alertSuccess').css('display', 'block');
          $('#alertSuccess').html(data)
          setTimeout(function () {
            $('#alertSuccess').fadeOut('slow')
            location.reload()
          }, 1000)


        }
      }).done(function (resultado) {
        console.log(resultado)
        // $('#alertSuccess').css('display', 'block');
        //   $('#alertSuccess').html(resultado)
        //   setTimeout(function () {
        //     $('#alertSuccess').fadeOut('slow')
        //   }, 3000)
        //   location.reload();
      })
    }
  })
})

function mostraSideBar() {
  $('#bodyContent').css('width', '100%')
}

function fechaSideBar() {
  $('#bodyContent').css('width', '0')
}

function cancelaComentario() {
  $("#textForm").css('display', 'block')
  $("#textForm").toggle("")
  $("#mostrarTextArea").css('display', 'block')
  $("#cancelaComentario").css('display', 'none')
}

function mostrarTextArea() {
  $("#textForm").css('display', 'none')
  $("#textForm").toggle("")
  $("#mostrarTextArea").css('display', 'none')
  $("#cancelaComentario").css('display', 'block')
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

function inserirTelefoneDadosCliente() {
  const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g, '')
    value = value.replace(/(\d{2})(\d)/, "($1) $2")
    value = value.replace(/(\d)(\d{4})$/, "$1-$2")
    return value
  }
  $.ajax({
    url: '../selectCliente.php',
    method: 'POST',
    dataType: 'JSON',
    success
  })
}

$(document).ready(function () {
  var id_urgencia = $("#selecionaUrgencia").val();
  console.log(id_urgencia)
  $("#tituloUrgencia").html('')
  $.ajax({
    url: '../cadastros/selectUrgencia.php',
    method: "POST",
    dataType: "JSON",
    data: { id_urgencia: id_urgencia },
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        $("#tituloUrgencia").prepend('<p class="form-control ' + data[i].color + '">' + data[i].descricao + '  ' + data[i].prazo + ' HORAS ' + '</p>')
      }
    }
  })
})

// function selectTipo() {
//   var id_tipo = $("#selecionaTipo").val();
//   console.log(id_tipo)
//   $("#tituloUrgencia").html('')
//   $.ajax({
//     url: '../cadastros/selectTipoChamado.php',
//     method: "POST",
//     dataType: "JSON",
//     data: { id_tipo: id_tipo },
//     success: function (data) {
//       for (let i = 0; i < data.length; i++) {
//         $("#tituloUrgencia").prepend('<p class="form-control ' + data[i].color + '">' + data[i].urgencia + '  ' + data[i].prazo + ' HORAS ' + '</p>')
//       }
//     }
//   })
// }

function selectUrgencia() {
  var id_urgencia = $("#selecionaUrgencia").val();
  console.log(id_urgencia)
  $("#tituloUrgencia").html('')
  $.ajax({
    url: '../cadastros/selectUrgencia.php',
    method: "POST",
    dataType: "JSON",
    data: { id_urgencia: id_urgencia },
    success: function (data) {
      for (let i = 0; i < data.length; i++) {
        $("#tituloUrgencia").prepend('<p class="form-control ' + data[i].color + '">' + data[i].descricao + '  ' + data[i].prazo + ' HORAS ' + '</p>')
      }
    }
  })
}

$(document).ready(function (e) {
  $.ajax({
    url: '../updates/update_ticket.php',
    method: 'GET',
    dataType: 'JSON'
  }).done(function (data) {
    console.log(data)
  })
})