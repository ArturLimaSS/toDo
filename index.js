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