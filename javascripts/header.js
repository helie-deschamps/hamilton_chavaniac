var modal = document.getElementById("connection_modal")
var modalBackground = document.getElementById("connection_modal-background")
var modalNotif = document.getElementById("notification_modal")
var modalNotifContent = document.getElementById("notification_infos")
var buttonConnection= document.getElementById("connexion")
var modalNotifTimer
document.getElementById("notification_modal_close").addEventListener("click", function(){
    modalNotif.classList.add('minified_modal')
    console.log(modalNotifTimer)
})
pushNotif = function(content, isAlert){
    modalNotif.classList.remove('minified_modal')
    if(content){
        modalNotifContent.innerHTML = content
    }
    if(isAlert){
        modalNotif.classList.add('alertnotif')
    }
    else{
        modalNotif.classList.remove('alertnotif')
    }
    if (modalNotifTimer) clearTimeout(modalNotifTimer)
    modalNotifTimer = setTimeout(()=>modalNotif.classList.add('minified_modal'),12000)
}
modalBackground.addEventListener("click", function(){
    modal.style.display = "none"
    modalBackground.style.display = "none"
})
buttonConnection.addEventListener("click", function(){
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
            try {
                connection(JSON.parse(rep))
            } catch (e) {
                pushNotif(`La connection a échoué. ${rep}`, true)
            }
        } else {
            console.error('Erreur de requête AJAX', xhttp.statusText)
        }
    }
    xhttp.onerror = function() {
        console.error('Erreur réseau lors de la requête AJAX');
    }

    xhttp.send(formData)
}

connection = function(user){
    buttonConnection.classList.add('connected')
    buttonConnection.classList.remove('disconnected')
    modal.classList.add('connected')
    modal.classList.remove('disconnected')
    document.getElementById('user_icon').src = `/img/users_icons/${user.code_icone}.png`
    document.getElementById('user_icon').alt=`icon de ${user.username}`
}
disconnection = function(){
    buttonConnection.classList.remove('connected')
    buttonConnection.classList.add('disconnected')
    modal.classList.remove('connected')
    modal.classList.add('disconnected')
    document.cookie = `connsessco=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`
    document.cookie = `conncusr=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`
    pushNotif("Vous avez été déconnecté")
}