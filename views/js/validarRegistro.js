/*===========
 VALIDAR REGISTRO
=============*/
function validarRegistro(){
    console.log("Si funciona");
    var usuario = document.querySelector('#usuarioRegistro').value;
    console.log("usuario ", usuario);
    var password = document.querySelector('#passwordRegistro').value;
    console.log("password" , password);
    var email = document.querySelector('#emailRegistro').value;
    console.log("email " , email);
    return false;
}