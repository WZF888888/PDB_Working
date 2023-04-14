function Validationlogin(){
    let UserInputUsernameWithoutEncryption = document.getElementById('inputL1').value;
    let UserInputPasswordWithoutEncryption = document.getElementById('inputL2').value;
    if (UserInputUsernameWithoutEncryption != "" && UserInputPasswordWithoutEncryption != "") {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        // Update later with SHA512 Encryption
        let UserInputUsername = UserInputUsernameWithoutEncryption;
        let UserInputPassword = UserInputPasswordWithoutEncryption;
        var URL = "Login-Process.php?Username=" + UserInputUsername + "&Password=" + UserInputPassword;
        xhttp.open("Get", URL, true);
        xhttp.send();
    } else {
        if (UserInputUsername == "" && UserInputPassword == "") {
            alert("Please Input Username and Password!");
        }
        if (UserInputUsername == "" && UserInputPassword != "") {
            alert("Please Input Username!");
        }
        if (UserInputUsername != "" && UserInputPassword == "") {
            alert("Please Input Password!");
        }
    }
}

function ValidationRegister(){
    let UserInputEmail = document.getElementById('inputL1').value;
    let UserInputPhone = document.getElementById('inputL2').value;
    let UserInputUsername = document.getElementById('inputL3').value;
    let UserInputPasswordInput1 = document.getElementById('inputL4').value;
    let UserInputPasswordInput2 = document.getElementById('inputL5').value;
    if(UserInputEmail != "" && UserInputPhone != "" && UserInputUsername != "" && UserInputPasswordInput1 != "" && UserInputPasswordInput2 != ""){
        if(UserInputPasswordInput1 == UserInputPasswordInput2){
            var URL = "Register-Process.php?Username="+UserInputUsername+"&Password="+UserInputPasswordInput1;
        }
        else{
            alert("Password that you enter was not allowed");
        }
    }
    else{
        if(UserInputEmail == "" && UserInputPhone != "" && UserInputUsername != "" && UserInputPasswordInput1 !=""  && UserInputPasswordInput2 != ""){
            alert("Please Input Email Address!");
        }
    }
}