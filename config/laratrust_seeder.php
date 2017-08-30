<?php

return [
    'role_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'posts' => 'r,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'posts' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'posts' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
