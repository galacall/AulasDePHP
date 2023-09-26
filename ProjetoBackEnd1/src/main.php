<?php

include_once __DIR__ . "/../vendor/autoload.php";

use App\ServicosSistema\MonologFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

$logger = MonologFactory::getInstance();

$logger->info("Top 10 infos de 2022");
$logger->debug("Arquivo main.php rodando...");
$logger->error("Erros:");

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);

$app->get('/usuario', function (Request $request, Response $response) {
    $response->getBody()->write('Olá Mundo! Eu estou mostrando para você, usuário, que o Slim está presente no projeto.');
    return $response;
});

$app->run();