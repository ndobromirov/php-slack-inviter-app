<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new \Slim\Views\PhpRenderer($settings['template_path']);
};

$container['view'] = function ($c) {
    $settings = $c->get('settings')['view'];
    $renderer = $c->get($settings['renderer_component_name']);
    return new \App\LayoutView($renderer, [
        'template_extension' => $settings['template_extension'],
        'layout_template' => $settings['layout_template'],
        'layout_attributes' => $settings['layout_attributes'],
    ]);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
