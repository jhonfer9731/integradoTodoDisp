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
    socket.on('led_inicial',(senal) => {
        console.log('mensaje: '+senal);
        socketIo.emit('led_inicial',senal);
    });
    socket.on('disconnect', ()=>{
        console.log("user disconnected");
    });
    socket.on('arduinoOutput',(senal) => {
        console.log('mensaje: '+senal);
        socketIo.emit('arduinoOutput',senal);
    });     
    

});






