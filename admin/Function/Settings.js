
var yearlevel = document.getElementById("txtyearlevel");
yearlevel.addEventListener("keyup", event=> {
    if(event.keyCode === 13){
        $('#yearadd').click();
    }
})
$('#yearadd').click(() => {
    var yearArray = {
        'data1' : yearlevel.value,
        'yeartrigger' : 1
    }
    year_validate(yearArray);
})

const year_validate = (array) => {
    if(!array.data1)
    {
        swal("Oops!", "Empty year data field!", "error");
        return false;
    }else{
        promisingAll(array);
    }
}

const promisingAll = (rayarray) => {
    Promise.all([__constructYearPromise(rayarray)]);
}

const __constructYearPromise = (array) => {
    const promise = new Promise((resolve) => {
        yearmain_request(array, resolve);
    })
    promise
        .then(response => {
            console.log(response);
            var breaker = JSON.parse(response);
            if(breaker.statusCode == 200){
                swal("Yey!", "Successfully Added!", "success");
                setTimeout(() => {
                    window.location.href = "http://localhost/webattendancerepo/admin/yearconfig";
                }, 2000)
            } else if(breaker.statusCode == "exceed"){
                swal("Oops!", "You've reached maximum data on the table", "error");
                return false;
            }
        })
}

const yearmain_request = (array, resolve) => {
    $.ajax({
        method: 'post',
        url: 'helpers' + "/api/YearHelper/yearHelper",
        data: array,

        success: (response) => {
            resolve(response);
        }
    })
}

function yearonrevoke(id){
    yearRevokeConstructor(id);
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
}

const yearRevokeConstructor = (id) => {
    const promise = new Promise(resolve => {
        revoked(id, resolve);
    })
    promise.then(response => {
        console.log(response);
        var y = JSON.parse(response);
        if(y.statusCode == 200){
            swal("Done!", "Successfully Revoked!", "success");
            setTimeout(() => {
                window.location.href = "http://localhost/webattendancerepo/admin/yearconfig";
            }, 2000)
        }
    })
}
const revoked = (id, resolve) => {
    $.ajax({
        method: 'post',
        url: 'helpers' + "/api/YearHelper/yearHelper",
        data: {
            id: id,
            yearRevokeTrigger: 1
        },
        success: (response) => {
            resolve(response);
        }
    })
}

// profile settings
function previewFile(input){
    var file = $("input[type=file]").get(0).files[0];
    var reader = new FileReader();
    if(file){

        reader.onload = function(){
            $("#preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
}
var valkeypress1 = document.getElementById("pfirstname");
valkeypress1.addEventListener("keyup", event => {
    if(event.keyCode === 13){
        onsaveprofileadmin();
    }
})
var valkeypress2 = document.getElementById("plastname");
valkeypress2.addEventListener("keyup", event => {
    if(event.keyCode === 13){
        onsaveprofileadmin();
    }
})

function onsaveprofileadmin(){
    var upfname = $('#pfirstname').val();
    var uplname = $('#plastname').val();
    profileprofilevalidate(upfname, uplname)
}

function profileprofilevalidate(upfname, uplname) {
    if(!upfname || !uplname){
        swal("Oops!", "empty fields", "error");
        return false;
    }
    else{
        profilePromise(upfname, uplname);
    }
}

function profilePromise(upfname, uplname)
{
    var testArray = {
        'data1': upfname,
        'data2' : uplname
    }
    const promise = new Promise(resolve => {
        profileEndpoint(testArray, resolve);
    })

    promise
        .then(response => {
            console.log(response);
            var hammerism = JSON.parse(response);
            if(hammerism.statusCode === 200){
                swal("Nice!", "Successfully Update!", "success");
                setTimeout(() => {
                    window.location.href = "http://localhost/webattendancerepo/admin/profile";
                }, 2000)
            } else if(hammerism.statusCode === 201){
                swal("Nice!", "Successfully Update!", "success");
                setTimeout(() => {
                    window.location.href = "http://localhost/webattendancerepo/admin/profile";
                }, 2000)
            }
        })
}

function profileEndpoint(testArray, resolve)
{
    var lateimage = "";
    var property = document.getElementById("file").files[0];
    lateimage = property;
    var profile_firstname = testArray.data1;
    var profile_lastname = testArray.data2;
    var OAuth = new FormData();
    OAuth.append("file", property);
    OAuth.append("firstname", profile_firstname);
    OAuth.append("lastname", profile_lastname);
    OAuth.append("acts", "update");
    $.ajax({
        method: 'post',
        url: 'helpers' + "/api/ProfileHelper/profile.helper.blade.php",
        data: OAuth,
        cache: false,
        processData: false,
        contentType: false,
        success: (rest) => {
            resolve(rest);
        }
    })
}