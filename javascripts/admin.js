// quand on modifie la valeur du camp #email, on vérifie si l'email est valide on envoye le formulaire avec de l'ajax
// sans utiliser jquery

var email = document.getElementById('email')
var resultUser = document.getElementById('result-user')


email.addEventListener('input', function() {
    var xhr = new XMLHttpRequest();
    xhr.addEventListener('readystatechange', function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.responseText === "null") {
                resultUser.innerHTML = ""
                return
            }
            var response = JSON.parse(xhr.responseText);
            if (Array.isArray(response)) {
                resultUser.innerHTML = ""
                response.forEach(function(user) {
                    el = document.createElement("p")
                    el.innerHTML = `<span className="user-mail">${user.EMAIL}</span> (<b className="user-username">${user.USERNAME}</b>) <button class="user-supprimer-btn" data-id="${user.ID_UTILISATEUR}">Le supprimer</button>`.trim()
                    document.getElementById('result-user').appendChild(el)
                })
            } else {
                console.error("Recherche d'utilisateur invalide")
            }
        }
    })
    xhr.open('POST', 'admin.php?request=userbymail')
    xhr.send(email.value)
})