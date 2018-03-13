<?php
return [
    'role_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'sindicatos' => 'c,r,u,d',
            'estados' => 'c,r,u,d',
            'cidades' => 'c,r,u,d',
            'categoria' => 'c,r,u,d',
        ],
        'sindicalista' => [
            'users' => 'c,r,u,d',
            'sindicatos' => 'c,r,u',
            'estados' => 'r',
            'cidades' => 'r',
            'categoria' => 'r',
        ],
        'funcionario' => [
            'users' => 'r, u',
            'sindicatos' => 'r',
            'estados' => 'r',
            'cidades' => 'r',
            'categoria' => 'r',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
