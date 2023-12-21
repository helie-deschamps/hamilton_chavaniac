document.addEventListener('DOMContentLoaded', (event) => {
    const decreaseButtons = document.querySelectorAll('.decrease');
    const increaseButtons = document.querySelectorAll('.increase');

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
});

