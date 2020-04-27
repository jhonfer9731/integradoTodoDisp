function validateReg(){

    const contrasenas = [document.getElementsByName('contrasena')[0], document.getElementsByName('contrasenax2')[0]];
    if(contrasenas[0].value === contrasenas[1].value)
    {
        return true;
    }else{
        alert("Contraseñas no coinciden");
        contrasenas[0].value = '';
        contrasenas[1].value = '';
        return false;
    }
}

function validateRegCorreo(){

    const contrasenas = [document.getElementsByName('contrasena_c')[0], document.getElementsByName('contrasena_c2')[0]];
    if(contrasenas[0].value === contrasenas[1].value)
    {
        return true;
    }else{
        alert("Contraseñas no coinciden");
        contrasenas[0].value = '';
        contrasenas[1].value = '';
        return false;
    }
}