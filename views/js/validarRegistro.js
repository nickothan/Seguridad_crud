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
    /*VALIDAR USUARIO*/
    if (usuario != ""){
        /* Validar espacio de usuario Registro*/
        var caracteres = usuario.length;
        if(caracteres > 6){
            document.querySelector("label[for='usuarioRegistro']").innerHTML +=" <br> Escriba menos de 6 caracteres";
            return false;
        }
        /*VALIDAR CARACTERES ESPECIALES DE usuario*/
        var expresion = /  ^[a-zA-Z0-9]*$ /;
        if (!expresion.test(usuario)){
            document.querySelector("label[for='usuarioRegistro']").innerHTML +=" <br> por favor no escriba caracteres especiales";
            return false;
        }
    }
    return true;
}