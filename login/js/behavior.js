
window.onload= () => {

    const loginForm = document.querySelector('.logIn_form');
    const registerForm = document.querySelector(".signUp_form");
    const reg_btn = document.querySelector("#reg_btn");
    const login_btn = document.querySelector("#login_btn");
    const login_error = document.querySelector(".problema_login");
    const contrasenas = [document.getElementsByName('contrasena'),document.getElementsByName('contrasenax2')];
    

    console.log(contrasenas);
    alert("espere");

    if(!login_error)
    {
        
    }
   

    login_btn.addEventListener("click",(event)=>{
        event.preventDefault();
        loginForm.style ="display: block;";
        registerForm.style ="display: none;";
    });

    reg_btn.addEventListener("click",(event)=>
    {
        event.preventDefault();
        loginForm.style ="display: none;";
        registerForm.style ="display: block;";
    });
}