let allValid = { "username" : false, "email" : false, "password": false , "confpassword": false };  

function validation(element) {
    type = element.type;

    if(type == 'text') valideUserName(element);
    else if(type == 'email') validateEmail(element);
    else if(type == 'password') {
        validatePassword(element);
        validateCheckPassword(document.getElementById("confpassword"));
    }
    else if(type == 'password') validateCheckPassword(element);
    valideRegister();
}

function valideUserName(element){
    value = element.value;
    if(value.length < 4){
        element.classList.add("is-invalid");
        allValid['username'] = false;
    }
    else {
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
        allValid['username'] = true;
    }
}

function validateEmail(element) {
    value = element.value;
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(!emailRegex.test(value)) {
        element.classList.add("is-invalid");
        allValid['email'] = false;
    } else {
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
        allValid['email'] = true;
    }
}

let password ="";
function validatePassword(element) {
    value = element.value;
    if(value.length < 8) {
        element.classList.add("is-invalid");
        allValid['password'] = false;
    } else {
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
        password = value;
        allValid['password'] = true;
    }
}

function validateCheckPassword(element) {
    value = element.value;
    if(value != password) {
        element.classList.add("is-invalid");
        allValid['confpassword'] = false;
    } else {
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
        allValid['confpassword'] = true;
    }
}

function valideRegister(){
    button = document.getElementById('register-id');
    if(Object.values(allValid).every((val) => val === true)) {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
}

valideRegister();