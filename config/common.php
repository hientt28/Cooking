<?php

return [
    'limit' => [
        'page_limit' => 10,
    ],
    'user' => [
        'avatar_path' => '/upload/',
        'default_avatar' => '/images/default.png',
        'user_limit' => 30,
        'confirmed' => [
            'is_confirm' => 1,
            'not_confirm' => 0,
        ],
        'confirmation_code' => [
            'length' => 10,
        ],
    ],
    'roles' => [
        'user' => 0,
        'admin' => 1,
    ],
];
