<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

/*
 * Тут встановлюється константа LARAVEL_START.
 */
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

/*
 * Тут підтягуються maintenance'и.
 */
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

/*
 * Тут запускається Composer.
 */
require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

/*
 * Тут запускається bootstrap/app.php.
 */
$app = require_once __DIR__.'/../bootstrap/app.php';

/*
 * Тут запускається Kernel.
 */
$kernel = $app->make(Kernel::class);

/*
 * Тут отримується Request.
 */
$response = $kernel->handle(
    $request = Request::capture()
)->send();

/*
 * Тут Request відпрацьовує.
 */
$kernel->terminate($request, $response);
