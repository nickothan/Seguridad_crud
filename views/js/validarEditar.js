/*======================
VALIDACION DE INICIO
=========================*/
function validarEditar(){
    var usuario = document.querySelector('#usuarioEditar').value;
    var password = document.querySelector('#passwordEditar').value;
    var email = document.querySelector('#emailEditar').value;

    if(usuario != ""){
        var contador = usuario.length;
        if(contador>6){
            document.querySelector("label[form='usuarioEditar']").innerHTML+="<br> Maximo 6 caracteres en el nombre.";
            return false;
        }
        var expresion = /^[a-zA-Z0-9]*$/;
        if(!expresion.test(usuario)){
            document.querySelector("label[form='usuarioEditar']").innerHTML +="<br> Caracteres invalidos";
            return false;
        }
    }
    if(password != ""){
        var contador= password.length;
        if(contador<8){
            document.querySelector("label[form='passwordEditar']").innerHTML+= "<br> Escriba minimo 8 caracteres";
            return false;
        }
        var expresion = /^[a-zA-Z0-9]*$/;
        if(!expresion.test(password)){
            document.querySelector("label[form=''passwordEditar]").innerHTML+="<br> La contraseña solo puede tener combinacion entre [a-z][A_Z][0-9]";
            return false;
        }
    }
    if(email!=""){
        var expresion = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(!expresion.test(email)){
            document.querySelector("label[form='emailEditar']").innerHTML+="<br> Email invalido, escriba correctamente el email."
        }
    }
    return true;
}