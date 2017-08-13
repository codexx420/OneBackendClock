<?php

return [
    'front' => [
        'throwExceptions'        => true,
        'disableOutputBuffering' => false,
        'showException'          => true,
    ],
    'errorHandler' => [
        'throwOnRecoverableError' => true,
    ],
    'cache' => [
        'backend' => 'Black-Hole',
        'backendOptions' => [],
        'frontendOptions' => [
            'write_control' => false
        ],
    ],
    'model' => [
        'cacheProvider' => 'Array'
    ],
    'httpCache' => [
        'enabled' => true,
        'debug' => true,
    ],
    'phpsettings' => [
        'display_errors' => 1,
        'display_startup_errors' => 1,
        'display_errors' => 1,
        'display_startup_errors' => 1,
        'error_reporting'    => E_ALL,
        'date.timezone'      => 'Europe/Berlin',
        'max_execution_time' => 0
    ],
    'csrfProtection' => [
        'frontend' => false,
        'backend' => false
    ],
    'db' => [
        'username' => "__DB_USER__",
        'password' => "__DB_PASSWORD__",
        'dbname' => "__DB_DATABASE__",
        'host' => "__DB_HOST__",
        'port' => "__DB_PORT__"
    ],
    'session' => [
        'name' => 'SHOPWARESID',
        'cookie_lifetime' => 0,
        'use_trans_sid' => false,
        'gc_probability' => 1,
        'gc_divisor' => 100,
        'save_handler' => 'db'
    ],
];

