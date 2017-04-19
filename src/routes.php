<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use PhpSlackInviter\InviteHandler;

// TODO: Add CSRF.
// TODO: Add validations.
// TODO: Update tests.

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

    $email = $request->getParsedBody()['email'];

    //
    $settings = $this->get('settings');
    $team = $settings['slack_team_name'];
    $token = $settings['slack_access_token'];

    try {
        $handler = new InviteHandler($token, $team);
        $handler->requestNewInvite($email);
        return $response->withStatus(302)->withHeader('Location', '/success');
    }
    catch (\PhpSlackInviter\Exception $e) {
        // TODO: Add flash message for the error page.
        echo $e->getMessage();
    }
});

$app->get('/success', function($request, $response) {
    return $this->view->render($response, 'success');
});
