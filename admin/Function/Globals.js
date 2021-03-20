
const post = "post";
const helpers = "helpers";
const keysection = document.getElementById("txtsection");
keysection.addEventListener("keyup", event => {
    if(event.keyCode === 13) {
        $('#onsection').click();
    }
})


