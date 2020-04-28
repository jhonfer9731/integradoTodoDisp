const cerrarSesion = document.querySelector('#cerrar-sesion');
const encenderBtn = document.querySelector(".btn-success");
const apagarBtn = document.querySelector(".btn-danger");
const monitorIot = document.querySelector(".iots-monitor");
const wSocket = io("http://localhost:5000/");

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

wSocket.on('arduinoOutput', (output) => {
    monitorIot.innerText = JSON.parse(output).valor;
});


function enviarSenalDisp(senal){

    const url =  "http://localhost/webCourse/cursoPHPyoutube/todolist/IoTcon/";

    //webSockets.io

    wSocket.emit('led_inicial',JSON.stringify(senal));
    
    /*wSocket.on('led_inicial', (mensaje) => {
        console.log(mensaje);
    });*/



    //peticion post al servidor PHP

    fetch(url, {
        method: 'POST',
        body: JSON.stringify(senal),
        headers:{
            'Content-Type':'application/json'
        }
    }).then(response => response.json()).then(
        res => {
            //console.log(res);
        }
    );
}






function cerrar_sesion(event)
{
    alert("Hasta Pronto");
    wSocket.emit('end');
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


