$('#onnavigatesignin').click(() => {
    window.location.href = "http://localhost/webattendance/signin"
})



$('#onsignup').click(() => {
    __validate_();
})

function __validate_()
{
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(!firstname.value || !lastname.value || !username.value || !email.value || !password.value || !conpass.value)
    {
        swal("Oops!", "empty fields please try again...", "error");
        return false;
    }
    else if(!email.value.match(mailformat)){
        swal("Oops!", "Invalid email address", "error");
        return false;
    }
    else if (password.value != conpass.value){
        swal("Oops!", "Password does not match", "error");
        return false;
    }
    else{
        promise_all();
    }
}

function promise_all()
{
    Promise.all([__constructPromise()]);
}

const __constructPromise = () => {
   
    const promise = new Promise((resolve) => {
        __mainrequest_(resolve);
    })

    promise.then((response) => {
        var hammer = JSON.parse(response);
        if(hammer.statusCode == 200)
        {
            swal("Yey!", "Successfully Register! Please contact the admin for your account activation", "success");
        }
    })
    .then(() => {
        firstname.value = "";
        lastname.value = "";
        username.value = "";
        email.value = "";
        password.value = "";
        conpass.value = "";
        setTimeout(() => {
            window.location.href = "http://localhost/webattendance/signin"
        }, 3000)
    })
}


const __mainrequest_ = (resolve) => {
    __mainrequest_ajax(resolve);
}

const post = "post";
const api = "helpers";
const __mainrequest_ajax = (resolve) => {
    var infocredentials = {
        'firstname': firstname.value,
        'lastname': lastname.value,
        'username': username.value,
        'email': email.value,
        'password': password.value,
        'trigger': 1
    }
    $.ajax({
        method: post,
        url: api + "/api/dataHelpers/helpers",
        data: infocredentials,

        success: (response) => {
            resolve(response);
        }
    })
}
