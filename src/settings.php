<?php

// Load .env configs.
$dotEnv = new \Dotenv\Dotenv(dirname(__DIR__));
$dotEnv->load();
$dotEnv->required([
    'APP_SLACK_TEAM_NAME',
    'APP_SLACK_ACCESS_TOKEN',
]);


return [
    'settings' => [

        'slack_team_name' => getenv('APP_SLACK_TEAM_NAME'),
        'slack_access_token' => getenv('APP_SLACK_ACCESS_TOKEN'),

        // set to false in production
        'displayErrorDetails' => true,

        // Allow the web server to send the content-length header
        'addContentLengthHeader' => false,

        // Views with shared layout rendering utility.
        'view' => [
            'renderer_component_name' => 'renderer',
            'template_extension' => 'phtml',
            'layout_template' => 'layout_default',
            'layout_attributes' => [],
        ],

        // Renderer settings.
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings.
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../runtime/logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
    ],
];
