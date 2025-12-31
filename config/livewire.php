<?php

return [
    'class_namespace' => 'App\\Livewire',
    'view_path' => resource_path('views/livewire'),
    'layout' => 'layouts.app',
    'lazy_loading_placeholder' => null,
    'morphdom' => [
        'skip' => ['alpine:ignore', '@raw'],
    ],
    'inject_assets' => true,
    'navigate' => [
        'enabled' => true,
    ],
    'pagination' => [
        'default' => 'tailwind',
    ],
];
