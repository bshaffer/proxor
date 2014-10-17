<?php

if (!file_exists(__DIR__.'/vendor/autoload.php')) {
    exit('Please run "composer.phar install" in the project directory');
}

require_once __DIR__.'/vendor/autoload.php';

$request = Symfony\Component\HttpFoundation\Request::createFromGlobals();

$json = array(
    'scheme'    => $request->getScheme(),
    'port'      => $request->getPort(),
    'host'      => $request->getHost(),
    'method'    => $request->getMethod(),
    'path'      => $request->getPathInfo(),
    'querystring' => $request->getQuerystring(),
    'content'   => $request->getContent(),

    'headers' => $request->headers->all(),
    'query'   => $request->query->all(),
    'request' => $request->request->all(),
    'attributes' => $request->attributes->all(),
    'cookies'   => $request->cookies->all(),
    'files'     => $request->files->all(),
    'server'    => $request->server->all(),

);

$response = new Symfony\Component\HttpFoundation\JsonResponse($json);

$response->send();
