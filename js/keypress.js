// var firstname = document.getElementById("txtfirstname");
// firstname.addEventListener("keyup", event => {
//     if (event.keyCode == 13) {
//         $('#onsignup').click();
//     }
// })

// var lastname = document.getElementById("txtlastname");
// lastname.addEventListener("keyup", event => {
//     if (event.keyCode == 13) {
//         $('#onsignup').click();
//     }
// })

// var username = document.getElementById("txtusername");
// username.addEventListener("keyup", event => {
//     if (event.keyCode == 13) {
//         $('#onsignup').click();
//     }
// })

// var email = document.getElementById("txtemail");
// email.addEventListener("keyup", event => {
//     if (event.keyCode == 13) {
//         $('#onsignup').click();
//     }
// })

// var password = document.getElementById("txtpassword");
// password.addEventListener("keyup", event => {
//     if (event.keyCode == 13) {
//         $('#onsignup').click();
//     }
// })

// var conpass = document.getElementById("txtconpassword");
// conpass.addEventListener("keyup", event => {
//     if (event.keyCode == 13) {
//         $('#onsignup').click();
//     }
// })

var emailusername = document.getElementById("txtemailusername");
emailusername.addEventListener("keyup", event => {
    if(event.keyCode == 13){
        $('#onsignin').click();
    }
})

var signpass = document.getElementById("txtsignpass");
signpass.addEventListener("keyup", event => {
    if(event.keyCode == 13){
        $('#onsignin').click();
    }
})