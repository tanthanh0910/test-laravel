<?php

use App\Models\User;

return [
    'names' => [
        User::ROLE_MANAGER => 'Manager',
        User::ROLE_ADMIN => 'Admin',
        User::ROLE_SALE => 'Sale',

    ],

    'permissions' => [
        User::ROLE_MANAGER => null, // Null mean to full access
        User::ROLE_ADMIN => [
            'admin.users.index',
            'admin.users.show',
            'admin.users.create',
            'admin.users.edit',
        ],
        User::ROLE_SALE => [
            'admin.users.index',
            'admin.users.show',
        ],
    ],

    'none_authorize_actions' => [

    ]
];