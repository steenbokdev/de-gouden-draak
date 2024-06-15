document.addEventListener('DOMContentLoaded', () => {
    document.getElementsByName('quantity').forEach((quantity) => {
        quantity.addEventListener('change', (event) => {
            amount = event.target.value;
            dish = event.target.dataset.dish;
            // get only menu_number, menu_addition, name and price from the dish
            let dishId = JSON.parse(dish).id;

            if (amount === '0') {
                localStorage.removeItem('dish-' + dishId);
                return;
            }

            if (localStorage.getItem('dish-' + dishId) !== null) {
                localStorage.setItem('dish-' + dishId, amount);
            } else {
                localStorage.setItem('dish-' + dishId, amount);
            }
        });

        // Set the quantity to the value stored in localStorage
        let dishId = JSON.parse(quantity.dataset.dish).id;
        if (localStorage.getItem('dish-' + dishId) !== null) {
            quantity.value = localStorage.getItem('dish-' + dishId);
        }
    });

    document.getElementById('button-order').addEventListener('click', () => {
        let content = document.getElementById('order-dishes');
        getDishes().forEach((dish) => {
        });
    });

    function getDishes() {
        let dishes = [];
        let keys = Object.keys(localStorage);
        keys.forEach((key) => {
            if (key.includes('dish-')) {
                let dish = key.split('-')[1];
                let amount = localStorage.getItem(key);
                dishes.push({dish: dish, amount: amount});
            }
        });

        console.log(dishes);

        return dishes;
    }
});
