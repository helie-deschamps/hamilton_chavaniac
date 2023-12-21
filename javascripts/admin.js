// quand on modifie la valeur du camp #email, on vérifie si l'email est valide on envoye le formulaire avec de l'ajax
// sans utiliser jquery

var email = document.getElementById('email')
var resultUser = document.getElementById('result-user')
var message = document.getElementById('Message')


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
                    let el = document.createElement("p")
                    el.innerHTML = `<span className="user-mail">${user.EMAIL}</span> (<b className="user-username">${user.USERNAME}</b>) <button class="user-supprimer-btn" data-id="${user.ID_UTILISATEUR}" data-mail="${user.EMAIL}">Le supprimer</button> <button class="user-edit-username-btn" data-id="${user.ID_UTILISATEUR}" data-mail="${user.EMAIL}">Changer son mail</button>`.trim()
                    document.getElementById('result-user').appendChild(el)
                })
                for (const btn of document.getElementsByClassName('user-supprimer-btn')) {
                    btn.addEventListener('click', function() {
                        let mail = btn.getAttribute('data-mail')
                        if(window.confirm("Voulez-vous vraiment supprimer l'utilisateur " + mail + " ?")) {
                            let id = +this.getAttribute('data-id')
                            let xhr = new XMLHttpRequest()
                            xhr.addEventListener('readystatechange', function() {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.responseText === "1") {
                                        message.innerHTML = `Utilisateur ${mail} supprimé avec succès`
                                        message.style.color = "black"
                                    } else {
                                        message.innerHTML = "Erreur lors de la suppression de l'utilisateur"
                                        message.style.color = "red"
                                    }
                                }
                            })
                            xhr.open('POST', 'admin.php?request=suppruser')
                            xhr.send(id)
                        }
                    })
                }
                for (const btn of document.getElementsByClassName('user-edit-username-btn')) {
                    btn.addEventListener('click', function() {
                        let mail = btn.getAttribute('data-mail')
                        let newMail = window.prompt(`Nouveau nom d'utilisateur pour ${mail} :`)
                        if(/^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/gim.test(String(newMail))) {
                            let id = +this.getAttribute('data-id')
                            let xhr = new XMLHttpRequest()
                            xhr.addEventListener('readystatechange', function() {
                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                    if (xhr.responseText === "1") {
                                        message.innerHTML = `Utilisateur ${mail} modifié avec succès`
                                        message.style.color = "black"
                                    } else {
                                        console.log(xhr.responseText)
                                        message.innerHTML = "Erreur lors de la modification de l'utilisateur"
                                        message.style.color = "red"
                                    }
                                }
                            })
                            xhr.open('POST', 'admin.php?request=editmailuser')
                            xhr.send(JSON.stringify({id: id, mail: newMail}))
                        }
                        else {
                            message.innerHTML = "Email invalide"
                            message.style.color = "red"
                        }
                    })
                }
            } else {
                message.innerHTML = "Recherche d'utilisateur invalide"
            }
        }
    })
    xhr.open('POST', 'admin.php?request=userbymail')
    xhr.send(email.value)
})