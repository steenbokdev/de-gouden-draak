document.addEventListener('DOMContentLoaded', () => {
    const checkoutBtns = document.querySelectorAll('[data-add-checkout-dish]');
    const checkoutContainer = document.getElementById('checkout-container');

    const checkoutContent = new CheckoutContent();

    checkoutBtns.forEach(element => {
        element.addEventListener('click', () => {
            const [dishId, dishName, dishPrice] = element.dataset.addCheckoutDish.split('#');
            const dish = new Dish(dishId, dishName, parseFloat(dishPrice));
            checkoutContent.addDish(dish);
        });
    });
});

class Dish {

    constructor(dishId, dishName, price) {
        this.dishId = dishId;
        this.dishName = dishName;
        this.price = price;
    }

}

class OrderItem {

    constructor(dish) {
        this.dishId = dish.dishId;
        this.dishName = dish.dishName;
        this.price = dish.price;
        this.count = 1;
    }

    incrementCount() {
        this.count += 1;
    }

    decrementCount() {
        this.count -= 1;
    }

    getTotalPrice() {
        return (this.price * this.count).toFixed(2);
    }

}

class CheckoutContent {

    constructor() {
        this.items = [];
        this.checkoutContainer = document.getElementById('checkout-container');
    }

    addDish(dish) {
        let orderItem = this.items.find(item => item.dishId === dish.dishId);

        if (!orderItem) {
            orderItem = new OrderItem(dish);
            this.items.push(orderItem);
            this.createCheckoutItem(orderItem);
        } else {
            orderItem.incrementCount();
            this.updateCheckoutItem(orderItem);
        }

        console.log(`Dish: ${dish.dishName}, Count: ${orderItem.count}, Price: $${dish.price}`);
    }

    createCheckoutItem(orderItem) {
        const card = this.createCard(orderItem);
        this.checkoutContainer.append(card);
    }

    updateCheckoutItem(orderItem) {
        const counter = document.getElementById(`counter-${orderItem.dishId}`);
        const totalPrice = document.getElementById(`total-${orderItem.dishId}`);
        counter.innerText = orderItem.count;
        totalPrice.innerText = `Total: $${orderItem.getTotalPrice()}`;
    }

    createCard(orderItem) {
        const card = document.createElement('div');
        card.className = 'card';

        const cardContent = document.createElement('div');
        cardContent.className = 'card-content is-flex is-justify-content-space-between';

        const content = document.createElement('div');
        content.className = 'content';
        content.innerText = orderItem.dishName;

        const controls = this.createControls(orderItem);

        const totalPrice = document.createElement('p');
        totalPrice.id = `total-${orderItem.dishId}`;
        totalPrice.innerText = `Total: $${orderItem.getTotalPrice()}`;

        content.append(totalPrice);
        cardContent.append(content, controls);
        card.append(cardContent);

        return card;
    }

    createControls(orderItem) {
        const controls = document.createElement('div');
        controls.className = 'buttons has-addons';

        const minusBtn = document.createElement('a');
        minusBtn.className = 'button is-danger';
        minusBtn.innerText = '-';
        minusBtn.onclick = () => this.decrementItem(orderItem);

        const plusBtn = document.createElement('a');
        plusBtn.className = 'button is-success';
        plusBtn.innerText = '+';
        plusBtn.onclick = () => this.incrementItem(orderItem);

        const counter = document.createElement('span');
        counter.className = 'counter tag is-large';
        counter.id = `counter-${orderItem.dishId}`;
        counter.innerText = orderItem.count;

        controls.append(minusBtn, counter, plusBtn);

        return controls;
    }

    incrementItem(orderItem) {
        orderItem.incrementCount();
        this.updateCheckoutItem(orderItem);
    }

    decrementItem(orderItem) {
        if (orderItem.count > 1) {
            orderItem.decrementCount();
            this.updateCheckoutItem(orderItem);
        } else {
            this.removeItem(orderItem);
        }
    }

    removeItem(orderItem) {
        this.items = this.items.filter(item => item.dishId !== orderItem.dishId);
        document.getElementById(`counter-${orderItem.dishId}`).closest('.card').remove();
    }

}
