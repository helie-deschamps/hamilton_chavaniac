var modal = document.getElementById("connection_modal");
var modalBackground = document.getElementById("connection_modal-background");
modalBackground.addEventListener("click", function(){
    modal.style.display = "none"
    modalBackground.style.display = "none"
})
document.getElementById("connexion").addEventListener("click", function(){
    modal.style.display = "block"
    modalBackground.style.display = "block"
})

document.getElementById("form-conn").addEventListener("submit", function(e){
    e.preventDefault()
    submitConnectForm(new FormData(this))
})
document.getElementById("form-create-acc").addEventListener("submit", function(e){
    e.preventDefault()
    submitConnectForm(new FormData(this))
})

function submitConnectForm(formData) {
    var xhttp = new XMLHttpRequest()
    xhttp.open("POST", "connection.php", true)
    xhttp.onload = function() {
        if (xhttp.status >= 200 && xhttp.status < 300) {
            var rep = xhttp.responseText
            console.log(rep)
        } else {
            console.error('Erreur de requête AJAX', xhttp.statusText)
        }
    }
    xhttp.onerror = function() {
        console.error('Erreur réseau lors de la requête AJAX');
    }

    xhttp.send(formData)
}