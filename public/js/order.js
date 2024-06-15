class DishManager {
    constructor() {
        this.allQuantityInputs = document.getElementsByName('quantity');
        this.initQuantityInputs();
        this.initOrderButton();
        this.initOrderForm();
    }

    initQuantityInputs() {
        this.allQuantityInputs.forEach(quantity => {
            quantity.addEventListener('change', (event) => this.handleQuantityChange(event));
            this.setInitialQuantity(quantity);
        });
    }

    handleQuantityChange(event) {
        const amount = event.target.value;
        const dish = JSON.parse(event.target.dataset.dish);
        const dishId = dish.id;

        if (amount === '0') {
            localStorage.removeItem(`dish-${dishId}`);
        } else {
            localStorage.setItem(`dish-${dishId}`, amount);
        }
    }

    setInitialQuantity(quantity) {
        const dishId = JSON.parse(quantity.dataset.dish).id;
        const storedAmount = localStorage.getItem(`dish-${dishId}`);
        if (storedAmount !== null) {
            quantity.value = storedAmount;
        }
    }

    initOrderButton() {
        document.getElementById('button-order').addEventListener('click', () => this.updateOrderSummary());
    }

    updateOrderSummary() {
        const content = document.getElementById('order-dishes');
        content.innerHTML = '';
        const dishes = this.getDishes();
        dishes.forEach(dish => {
            this.allQuantityInputs.forEach(quantity => {
                const dishObject = JSON.parse(quantity.dataset.dish);
                if (dishObject.id == dish.dish) {
                    content.innerHTML += `<p>${dishObject.name} x ${dish.amount}</p>`;
                }
            });
        });
    }

    getDishes() {
        const dishes = [];
        const keys = Object.keys(localStorage);
        keys.forEach(key => {
            if (key.startsWith('dish-')) {
                const dishId = key.split('-')[1];
                const amount = localStorage.getItem(key);
                dishes.push({dish: dishId, amount: amount});
            }
        });
        return dishes;
    }

    initOrderForm() {
        document.getElementById('place-order-form').addEventListener('submit', (event) => this.handleOrderFormSubmit(event));
    }

    handleOrderFormSubmit(event) {
        event.preventDefault();
        const form = event.target;
        const dishes = this.getDishes();
        dishes.forEach((dish, index) => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = `dishes[${index}]`;
            input.value = JSON.stringify(dish);
            form.appendChild(input);
        });
        form.submit();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new DishManager();
});
