var emailusername = document.getElementById("txtemailusername");
emailusername.addEventListener("keyup", event => {
    if (event.keyCode == 13) {
        $('#onsignin').click();
    }
})

var signpass = document.getElementById("txtsignpass");
signpass.addEventListener("keyup", event => {
    if (event.keyCode == 13) {
        $('#onsignin').click();
    }
})