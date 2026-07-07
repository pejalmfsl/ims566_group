<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'auth'          => \App\Filters\AuthFilter::class,
    ];

    public array $required = [
        'before' => [],
        'after'  => [],
    ];

    public array $globals = [
        'before' => [
            'csrf',
        ],
        'after' => [
            'secureheaders',
        ],
    ];

    public array $methods = [];

    public array $filters = [];
}
