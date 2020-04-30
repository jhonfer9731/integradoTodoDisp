const Express = require('express');
const Io = require('socket.io');
const app = Express();

app.set('port', process.env.PORT || 5000);

app.get('/',(req,res)=>{
    res.send("<h1>Hola mundo</h1>");
});

const server = app.listen(app.get('port'),()=>{
    console.log('listening on port: ',app.get('port'))
});

//WebSockets
const socketIo = Io(server);  

socketIo.on('connection',(socket)=>{
    console.log('a user connected', socket.id);
    // la emite el cliente en WebApp
    socket.on('led_inicial',(senal) => { // se activa cuando el usuario en la pag web emite una senal con nombre led_inicial
        console.log('mensaje: '+senal);
        socketIo.broadcast.emit('led_inicial',senal);
    });
    socket.on('disconnect', ()=>{ // la senal se activa cuando un usuario se desconecta
        console.log("user disconnected");
    });

    // La emite el arduino al cliente
    socket.on('arduinoOutput',(senal) => { // 
        console.log('mensaje: '+senal);
        socketIo.emit('arduinoOutput',senal);
    });     
    

});






