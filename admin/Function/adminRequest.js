let modifier = false;
var coursename = document.getElementById("txtcoursename");
let coursefixed = document.getElementById("txtfixedcourse");
const base = "helpers";
const get = "get";

let muid = "";
let revokeID = 0;
//section settings
$('#onsection').click(() => {
    var sectionArray= { 
        'section1' : keysection.value,
        'sectiontrigger' : 1
    }
    _section_validate(sectionArray);

})

const _section_validate = (array) => {
    if (!array.section1) {
            swal("Oops!", "Empty section please type something", "error");
            return false;
        }else {
            section_PromiseAll(array);
        }
}

async function section_PromiseAll(cokearray){
    await Promise.all([section_constructPromise(cokearray)]);
}

async function section_constructPromise(spritearray){
    const promise = new Promise(resolve => {
        section_mainrequest(spritearray, resolve);
    })
    await promise.then(response => {
        var destroyJSON = JSON.parse(response);
        if(destroyJSON.statusCode === 200) {
            swal("Nice!" , "Successfully Added!", "success");
            setTimeout(() => {
                window.location.href = "http://localhost/webattendancerepo/admin/section";
            }, 1000)
        }
    })
}

const section_mainrequest = (array, resolve) => {
    $.ajax({
        method: post,
        url: helpers + "/api/sectionHelper/sectionHelper.php",
        data: array,
        success: (response) => {
            resolve(response);
        }
    })
}
coursename.addEventListener("keyup", event => {
    if(event.keyCode === 13)
    {
        $('#submitcourse').click();
    }
})

$('#submitcourse').click(() => {
    // alert("test");
    course_admin_settings_validate();
})

const course_admin_settings_validate = () => {
    if(!coursename.value)
    {
        swal("Oops!", "Course name is empty", "warning");
        return false;
    }
    else{
       if(modifier === true){
           PromiseAllModify();

       }else {
           PromiseAll();
       }
    }
}

const PromiseAllModify = () => {
    Promise.all([__constructPromiseModify()]);
}
//3/15/2021 - Latest Code - jonathan
const __constructPromiseModify = () => {
    var buildArray = {
        'id' : muid,
        'data1': coursename.value,
        'rebuildTrigger' : 1
    }
    const promise = new Promise(resolve => {
        priorityModifier(buildArray, resolve);
    })
    promise.then(response => {
        console.log(response);
        var jsonbreak = JSON.parse(response);
        if(jsonbreak.statusCode == 200) {
            swal("Yey!", "Successfully Updated!", "success");
            setTimeout(() => {
                window.location.href = "http://localhost/webattendancerepo/admin/course";
            }, 1000)
        }
    })
}
const priorityModifier = (array, resolve) => {
    $.ajax({
        method: 'post',
        url: base + "/api/courseHelper/courseHelper",
        data: array,

        success : (response) => {
            resolve(response);
        }
    })
}
//3/15/2021  - Latest Code Close
const PromiseAll = () => {
    Promise.all([constructPromise()]);
}

const constructPromise = () => {
    var _constructArray = {
        'data1' : coursefixed.value + " " + coursename.value,
        'coursetrigger' : 1
    }
    const promise = new Promise(resolve => {
        mainRequest(_constructArray, resolve)
    })

    promise.then(response => {
        console.log(response);
        var hammer = JSON.parse(response);
        if(hammer.statusCode == 200)
        {
            swal("Yey!", "Successfully Added!", "success");
            setTimeout(() => {
                window.location.href = "http://localhost/webattendancerepo/admin/course";
            }, 1000)
        }
    })
}

const mainRequest = (array, resolve) => {
    $.ajax({
        method: 'post',
        url: base + "/api/courseHelper/courseHelper",
        data: array,

        success: (response) => {
            resolve(response);
        }
    })
}
//revoke data
function onrevoke(id){
    // alert(id);
    document.getElementById("exampleModalLabel").innerHTML = "Revoke ID :" + " " + id;
    revokeID = id;
}
$('#onproceedrevoke').click(() => {
     HTTPRevoke();
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    
})

const HTTPRevoke = () => {
    const promise = new Promise(resolve => {
        Revoker(resolve)
    })
    promise.then(response => {
        console.log(response);
        
    })
}

const Revoker = (resolve) => {
    $.ajax({
        method: 'post',
        url: base + "/api/courseHelper/courseHelper",
        data: {
            id: revokeID,
            revokeTrigger: 1
        },

        success: function(response){
            var broker = JSON.parse(response);
            if(broker.statusCode == 200)
            {
                setTimeout(() => {
                    window.location.href = "http://localhost/webattendancerepo/admin/course";
                }, 2000)
            }
        }
    })
}
//modify data
function onmodifycourse(id)
{
    
    select_current_course_by_ID(id);
}
$('#onreset').click(() => {
    var btn = document.getElementById("onreset");
    if(btn.style.display !== "none"){
        btn.style.display = "none";
        modifier = false;
        coursename.value = "";
    }
})
const select_current_course_by_ID = (id) => {
    return new Promise((resolve) => {
        $.ajax({
            method: 'post',
            url: base + "/api/courseHelper/courseHelper",
            data: {
                id: id,
                selectionTrigger: 1
            },
            success: function(response){
                
                resolve(response);
            }
        })
    }).then(response => {
        var breaker = JSON.parse(response);
        modifier = true;
        document.getElementById("txtcoursename").value = breaker.statusCode;
        muid = breaker.statusID;
        var btn = document.getElementById("onreset");
        if(btn.style.display === "none"){
            btn.style.display = "block";
        }
    })
}



function HTTPRetrieve() {
    $.ajax({
        method: 'post',
        url: base + "/api/courseHelper/courseHelper",
        data: {
            queryselectorTrigger: 1
        },
        dataType: "html",
        cache: false,

        success: (response) => {
           
            $('#coursetable').html(response);
            
        }
    })
}



$("#searchcourse").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    if(!value){
        window.location.href = "http://localhost/webattendancerepo/admin/course";
    }else{
        $("#coursetable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    }
    
});



$('#data').after('<div id="nav"></div>');
var rowsShown = 4;
var rowsTotal = $('#data tbody tr').length;
var numPages = rowsTotal / rowsShown;
for (i = 0; i < numPages; i++) {
    var pageNum = i + 1;
    $('#nav').append('<a href="#" rel="' + i + '">' + pageNum + '</a> ');
}
$('#data tbody tr').hide();
$('#data tbody tr').slice(0, rowsShown).show();
$('#nav a:first').addClass('btn btn-primary');
$('#nav a').bind('click', function () {

    $('#nav a').removeClass('btn btn-primary');
    $(this).addClass('btn btn-primary');
    var currPage = $(this).attr('rel');
    var startItem = currPage * rowsShown;
    var endItem = startItem + rowsShown;
    $('#data tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
        css('display', 'table-row').animate({ opacity: 1 }, 300);
});


