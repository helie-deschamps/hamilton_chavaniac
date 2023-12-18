// Attendez que le DOM soit chargé
document.addEventListener('DOMContentLoaded', (event) => {
    // Sélectionnez tous les boutons de diminution
    const decreaseButtons = document.querySelectorAll('.decrease');
    // Sélectionnez tous les boutons d'augmentation
    const increaseButtons = document.querySelectorAll('.increase');

    // Fonction pour changer la quantité
    function changeQuantity(input, delta) {
        const currentValue = parseInt(input.value);
        const newValue = currentValue + delta;

        // Vérifiez que la nouvelle valeur est supérieure ou égale à 1
        if (newValue >= 1) {
            input.value = newValue;
        }
    }

    // Ajoutez un écouteur d'évènement pour chaque bouton de diminution
    decreaseButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const input = e.target.parentNode.querySelector('.quantity-input');
            changeQuantity(input, -1);
        });
    });

    // Ajoutez un écouteur d'évènement pour chaque bouton d'augmentation
    increaseButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const input = e.target.parentNode.querySelector('.quantity-input');
            changeQuantity(input, 1);
        });
    });
});
