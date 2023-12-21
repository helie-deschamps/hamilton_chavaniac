document.addEventListener('DOMContentLoaded', (event) => {
    const decreaseButtons = document.querySelectorAll('.decrease');
    const increaseButtons = document.querySelectorAll('.increase');

    document.querySelector('.billet-jaune .add-to-cart-btn').addEventListener('click', () => {
        addTicketToAccount(105, document.querySelector('.billet-jaune .quantity-input').value)
    })
    document.querySelector('.billet-marron .add-to-cart-btn').addEventListener('click', () => {
        addTicketToAccount(70, document.querySelector('.billet-marron .quantity-input').value)
    })
    document.querySelector('.billet-rouge .add-to-cart-btn').addEventListener('click', () => {
        addTicketToAccount(50, document.querySelector('.billet-rouge .quantity-input').value)
    })
    document.querySelector('.billet-vert .add-to-cart-btn').addEventListener('click', () => {
        addTicketToAccount(40, document.querySelector('.billet-vert .quantity-input').value)
    })

    function changeQuantity(input, delta) {
        const currentValue = parseInt(input.value);
        const newValue = currentValue + delta;

        if (newValue >= 1) {
            input.value = newValue;
        }
    }

    decreaseButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const input = e.target.parentNode.querySelector('.quantity-input');
            changeQuantity(input, -1);
        });
    });

    increaseButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const input = e.target.parentNode.querySelector('.quantity-input');
            changeQuantity(input, 1);
        });
    });

    addTicketToAccount = (price, quantity) => {
        if(user.id === undefined || user.id === null) {
            pushNotif(`Connectez vous pour ajouter des billets a votre panier !`, true)
        }
        let xhr = new XMLHttpRequest()
        xhr.addEventListener('readystatechange', function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                console.log(xhr.responseText)
                if (xhr.responseText === "1") {
                    pushNotif(`${quantity} billet${quantity>1?"s":""} ajouté${quantity>1?"s":""} à votre réservation !`)
                    updateTableauPrix()
                } else {
                    pushNotif(`Erreur lors de l'ajout des billets`, true)
                }
            }
        })
        xhr.open('POST', 'add_ticket.php')
        xhr.send(JSON.stringify({price: +price, userID: user.id, quantity: +quantity}))
    }
});

