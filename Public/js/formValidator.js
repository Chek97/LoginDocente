// List of all input nodes
const formButton = document.getElementById('submitUser');
const inputElements = document.querySelectorAll('input');


//colocar los mensajes de error en los campos input
formButton.onclick = function(e){
    let errors = {
        name: [],
        username: [],
        email: [],
        password: []
    };
    console.log("Se ejecuto el preventDefault");
    const validEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

    inputElements.forEach(input => {
        if(input.value === "" && input.name !== "last_name"){
            e.preventDefault();
            errors = {...errors, [input.name]: ["El campo no puede estar vacio"]};
        }
        
        if(input.name === "username" && input.value.length < 6){
            e.preventDefault();
            errors = {...errors, username: [...errors.username, "El usuario debe tener mas de 6 caracteres"]}
        }
        
        if(input.name === "email" &&  !validEmail.test(input.value)){
            e.preventDefault();
            errors = {...errors, email: [...errors.email, "El correo no es valido intentelo otra vez"]}
        }
        
        if(input.name === "password" && (input.value.length < 8 || !/[A-Z]/.test(input.value) || !/\d/.test(input.value))){
           e.preventDefault();
            errors = {...errors, password: [...errors.password, "La contraseña debe tener mas de 8 caracteres, al menos una letra mayuscula y 1 numero"]}
        }        
    });

    document.getElementById("name").innerHTML = errors.name;
    document.getElementById("username").innerHTML = errors.username;
    document.getElementById("email").innerHTML = errors.email;
    document.getElementById("password").innerHTML = errors.password;
}
