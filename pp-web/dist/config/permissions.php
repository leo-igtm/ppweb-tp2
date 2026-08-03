<?php

return [
    'admin' => [
        'manage_users' => true,
        'create_property' => true,
        'edit_any_property' => true,
        'edit_own_property' => true,
        'delete_any_property' => true,
        'delete_own_property' => true,
    ],
    'gerente' => [
        'manage_users' => false,
        'create_property' => true,
        'edit_any_property' => true,
        'edit_own_property' => true,
        'delete_any_property' => true,
        'delete_own_property' => true,
    ],
    'agente' => [
        'manage_users' => false,
        'create_property' => true,
        'edit_any_property' => false,
        'edit_own_property' => true,
        'delete_any_property' => false,
        'delete_own_property' => true,
    ],
    'cliente' => [
        'manage_users' => false,
        'create_property' => false,
        'edit_any_property' => false,
        'edit_own_property' => false,
        'delete_any_property' => false,
        'delete_own_property' => false,
    ],
];
