
window.onload = () => {

    const loginForm = document.querySelector('.logIn_form');
    const registerFormdiv = document.querySelector(".signUp_form");
    const reg_btn = document.querySelector("#reg_btn");
    const login_btn = document.querySelector("#login_btn");
    const login_error = document.querySelector(".problema_login");
    const contrasenas = [document.getElementsByName('contrasena')[0], document.getElementsByName('contrasenax2')[0]];
    const completar_reg = document.getElementsByName('completar_reg')[0];
    const registerForm = document.querySelector("#form-registro");

    if (login_error !== null) {
        
        if (login_error.innerHTML !== null) {
            login_error.classList.add('hayerror_login');
        }

    }

    /*function validateReg(){

        if(contrasenas[0].value === contrasenas[1].value)
        {
            return true;
        }else{
            alert("Contraseñas no coinciden");
            return false;
        }

    }*/

    /*completar_reg.addEventListener('click',(event)=>{
        //event.disabled = true;  
        event.preventDefault();
        console.log(contrasenas);
        if(contrasenas[0].innerText === contrasenas[1].innerText)
        {
            event.submit();
        }else{
            alert("Contraseñas no coinciden");
        }
    });*/









    login_btn.addEventListener("click", (event) => {
        event.preventDefault();
        loginForm.style = "display: block;";
        registerFormdiv.style = "display: none;";
    });

    reg_btn.addEventListener("click", (event) => {
        event.preventDefault();
        loginForm.style = "display: none;";
        registerFormdiv.style = "display: block;";
    });
}