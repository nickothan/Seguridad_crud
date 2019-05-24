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
        /* Validar espacios*/
        var caracteres = usuario.length;
        if(caracteres > 6){
            document.querySelector("label[for='usuarioRegistro']").innerHTML +=" <br> Escriba menos de 6 caracteres";
            return false;
        }
        /*VALIDAR CARACTERES ESPECIALES*/
        var expresion = /  ^[a-zA-Z0-9]*$ /;
        if (!expresion.test(usuario)){
            document.querySelector("label[for='usuarioRegistro']").innerHTML +=" <br> por favor no escriba caracteres especiales";
            return false;
        }
    }
    /*VALIDAR PASSWORD*/
    if (password != ""){
        /* Validar espacios*/
        var caracteres = password.length;
        if(caracteres < 8){
            document.querySelector("label[for='passwordRegistro']").innerHTML +=" <br> Escriba minimo 8 caracteres";
            return false;
        }
        /*VALIDAR CARACTERES ESPECIALES */
        var expresion = /  ^[a-zA-Z0-9]*$ /;
        if (!expresion.test(password)){
            document.querySelector("label[for='passwordRegistro']").innerHTML +=" <br> La contraseña solo puede tener combinacion entre [a-z][A_Z][0-9]";
            return false;
        }
    }
    return true;
}