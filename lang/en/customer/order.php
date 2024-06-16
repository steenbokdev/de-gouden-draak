<?php

return [
    'page_title' => 'Order',
    'add_to_order' => 'Add to order',
    'round' => 'Round :round',
    'order_watch' => 'Watch order',
    'place_order' => 'Place order',

    'order_success' => 'Order successfully placed',

    'validation' => [
        'dishes' => [
            'required' => 'Please select at least one dish',
            'amount' => [
                'max' => 'You can order a maximum amount of 10 per dish',
                'min' => 'You need to order at least 1 per dish',
            ]
        ],
        'order_time_rounds_left' => 'You can only place an order once per 10 minutes or you have no rounds left'
    ],
];
