/*======================
VALIDACION DE INICIO
=========================*/
function validarIngreso(){
    var usuario = document.querySelector('#usuarioIngreso');
    var password = document.querySelector('#passwordIngreso');
    /* VALIDACION DE USUARIO*/
    if(usuario != ""){
        var caracteres= usuario.length;
        if(caracteres >6){
            document.querySelector("label[for='usuarioIngreso']").innerHTML+= "<br> usuario o contraseña no encontrados"
            return false;
        }
        var expresion= /^[a-zA-Z0-9]*$/;
        if(!expresion.test(usuario)){
            document.querySelector("label[form='usuarioIngreso']").innerHTML += "<br> usuario o contraseña incorrecta.";
            return false;
        }
    }
    /* VALIDACION PASSWORD */
    if(password != ""){
        var caracteres= password.length;
        if(caracteres >6){
            document.querySelector("label[for='passwordIngreso']").innerHTML+= "<br> usuario o contraseña no encontrados"
            return false;
        }
        var expresion= /^[a-zA-Z0-9]*$/;
        if(!expresion.test(password)){
            document.querySelector("label[form='passwordIngreso']").innerHTML += "<br> usuario o contraseña incorrecta.";
            return false;
        }
    }
    return true;
}