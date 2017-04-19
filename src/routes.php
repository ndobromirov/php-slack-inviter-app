<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->get('/', function (RequestInterface $request, ResponseInterface $response) {
    $settings = $this->get('settings');

    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->view->render($response, 'index', [
        'team_name' => $settings['slack_team_name'],
    ]);
});

$app->post('/', function (RequestInterface $request, ResponseInterface $response) {
    return $response
        ->withStatus(302)
        ->withHeader('Location', '/');

});
