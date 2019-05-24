/*===========
 VALIDAR REGISTRO
=============*/
function validarRegistro(){
    
    var usuario = document.querySelector('#usuarioRegistro').value;
    var password = document.querySelector('#passwordRegistro').value;
    var email = document.querySelector('#emailRegistro').value;
    var email = document.querySelector('#terminos').checked;
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
    /*VALIDAR EMAIL*/
    if(email != ""){
        var expresion= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        if (!expresion.test(email)){
            document.querySelector("label[for'emailRegistro']").innerHTML+=" <br> Escriba correctamente el email."
            return false;
        }
    }
    /*VALIDAR TERMINOS*/
    if(!terminos){
        document.querySelector("form"). innerHTML += "<br> Acepte terminos y condiciones";
         usuario = document.querySelector('#usuarioRegistro').value=usuario;
         password = document.querySelector('#passwordRegistro').value= password;
         email = document.querySelector('#emailRegistro').value=email;
        return false;
    }
    return true;
}