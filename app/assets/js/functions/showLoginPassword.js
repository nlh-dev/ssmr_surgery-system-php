function showLoginPassword(){
    checkbox = document.getElementById('inputShowPassword');
    password = document.getElementById('password');
    if(checkbox.checked == true) {
        password.type = "text";
    } else {
        password.type = "password"
    }
}