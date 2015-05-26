<?php
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/application/bootstrap.php.cache';
require_once __DIR__ . '/application/AppKernel.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Debug\Debug;

/**
 * THIS FILE IS STIL HERE FOR LEGACY (NOT BASED ON INDEX.PHP) FILES.
 */

/**
 * Create Symfony kernel
 */
if (APPLICATION_ENV === 'production') {
    $kernel = new AppKernel('prod', false);
} else if (APPLICATION_ENV === 'development' || APPLICATION_ENV === 'dev') {
    $current_error_reporting = error_reporting();
    Debug::enable();
    error_reporting($current_error_reporting);
    $kernel = new AppKernel('dev', true);
} else {
    $kernel = new AppKernel(APPLICATION_ENV, true);
}

$kernel->loadClassCache();
$request = Request::createFromGlobals();

// We handle response to prepare all needed resources (from listeners).
$response = $kernel->handle($request, \Symfony\Component\HttpKernel\HttpKernelInterface::MASTER_REQUEST, false);
