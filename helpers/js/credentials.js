$('#onsignin').click(() => {
    credentialsValidate();
})

const credentialsValidate = () =>
{
    if (!emailusername.value || !signpass.value){
        swal("Oops!", "Empty fields", "warning");
        return false;
    }
    else{
        Promising();
    }
}

const Promising = () => {
    Promise.all([credentialsConstruct()]);
}

const credentialsConstruct = () => {
    const promise = new Promise((resolve) => {
        credentials_request(resolve);
    })

    promise.then(response => {
        var broker = JSON.parse(response);
        if(broker.statusCode == 200){
            swal("Yey!", "Successfully Signed in", "success");
            setTimeout(() => {
                window.location.href = "http://localhost/webattendance/admin/admin"
            }, 2000)
        } else if (broker.error == 404){
            swal("Oops!", "Invalid password please try again..", "error");
            return false;
        } else if (broker.invalid == 505){
            swal("Oops!", "Email or username doesn't exist", "error");
            return false;
        }
    })
}

const uri = "helpers";
const credentials_request = (resolve) => {
    var credentialArray = {
        'emailusername' : emailusername.value,
        'password' : signpass.value,
        'credent' : 1
    }
    $.ajax({
        method: post,
        url: uri + "/api/CredentialsHelpers/credentialsHelpers",
        data: credentialArray,

        success: (response) => {
            resolve(response);
        }
    })
}