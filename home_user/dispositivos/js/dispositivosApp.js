const cerrarSesion = document.querySelector('#cerrar-sesion');
const encenderBtn = document.querySelector(".btn-success");
const apagarBtn = document.querySelector(".btn-danger");


console.log(apagarBtn);
const cerrarS = {
    finish: true,
    logged_in : false
};




apagarBtn.addEventListener('click',offDevice);
encenderBtn.addEventListener('click',onDevice);
cerrarSesion.addEventListener('click', cerrar_sesion);



function offDevice(event){
    apagarBtn.disabled = true;
    encenderBtn.disabled = false;
    console.log("apagando");
    const senal = {
        estado: 'off',
        disp: 'led_inicial'
    }
    enviarSenalDisp(senal);

}

function onDevice(event){
    apagarBtn.disabled = false;
    encenderBtn.disabled = true;
    console.log("encendiendo");
    const senal = {
        estado: 'on',
        disp: 'led_inicial'
    }
    enviarSenalDisp(senal);
}


function enviarSenalDisp(senal){

    const url =  "http://localhost/webCourse/cursoPHPyoutube/todolist/IoTcon/";
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(senal),
        headers:{
            'Content-Type':'application/json'
        }
    }).then(response => response.json()).then(
        res => {
            console.log(res);
        }
    );
}






function cerrar_sesion(event)
{
    alert("Hasta Pronto");
    const url = "http://localhost/webCourse/cursoPHPyoutube/todolist/login/cerrarsesion.php";
    fetch(url,{
        method: 'POST',
        body: JSON.stringify(cerrarS),
        headers:{
            'Content-Type':'application/json'
        }
    }).then(response => response.json()).then(
        res => {
            console.log(res.location);
            document.location.href = res.location;
        }
    );   
}


