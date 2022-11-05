<?php

return [
    'role_structure' => [
        'admin' => [
            'user' => 'c,r,u,d',
            'customer' => 'c,r,u,d',
        ],
        'user' => [
            'user' => 'r',
            'customer' => 'r',
        ],

    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ]
];
