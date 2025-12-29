<?php

return [
    // ...

    'navigation' => [
        // Enable SPA mode
        'spa_mode' => true,

        // Show loading indicators
        'show_loading_indicator' => true,

        // Scroll to top on navigation
        'scroll_to_top' => true,
    ],

    'features' => [
        // Enable wire:navigate for anchor tags
        'wire_navigate' => true,

        // Enable script and style persistence
        'persistent' => [
            'scripts' => true,
            'styles' => true,
        ],
    ],
];
