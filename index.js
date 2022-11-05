function verifica(){
    let email = document.getElementById('email').value 
let senha = document.getElementById('senha').value 

if(!isset(email)){
    alert('Digite seu email')
}else if(!senha){
    alert('Digite sua senha')
}else if(!email && !senha){
    alert("Dados não preenchidos!")
}
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