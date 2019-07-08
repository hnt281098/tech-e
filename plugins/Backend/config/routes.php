<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Log\Log;
Router::plugin(

    'Backend',
    ['path' => '/backend'],
    function ($routes) {
        $routes->scope('/articles', ['controller'=>'articles'], function(RouteBuilder $routes){
            $routes->get('/', ['action'=>'view']);
            $routes->get('/view', ['action'=>'view']);
            $routes->post('/add', ['action'=>'add']);
            $routes->post('/approve', ['action' => 'approve']);
            $routes->post('/delete', ['action' => 'delete']);
        });

        $routes->scope('/categories', ['controller' => 'Categories'], function(RouteBuilder $routes) {
            $routes->get('/view', ['action' => 'view']);
            $routes->connect('/update', ['action' => 'update']);
        });
        
        $routes->scope('/users', ['controller' => 'Users'], function(RouteBuilder $routes) {
            $routes->post('/block-user', ['action'=>'blockUser']);
            $routes->connect('/login', ['action' => 'login']);
            // $routes->connect('/json/login', ['action' => 'login']);
            $routes->connect('/add', ['action' => 'add', '[_method]' => 'POST']);
            $routes->connect('/update', ['action' => 'update', '[_method]' => 'PATCH']);
            $routes->connect('/view', ['action' => 'view', '[_method]' => 'GET']);
            $routes->connect('/', ['action' => 'view', '[_method]' => 'GET']);
            $routes->connect('/viewDetail/:id', ['action' => 'viewDetail', '[_method]' => 'GET']);
            $routes->connect('/delete', ['action' => 'delete', '[_method]' => 'DELETE']);
            $routes->connect('/register', ['action' => 'register', '[_method]' => 'POST']);
            $routes->connect('/logout', ['action' => 'logout']);
            $routes->connect('/uploadAvatar', ['action' => 'uploadAvatar', '[_method]' => 'POST']);
            $routes->connect('/check-email', ['action' => 'checkEmail', '[_method]' => 'GET']);
        });

        $routes->scope('/permissions', ['controller' => 'Permissions'], function(RouteBuilder $routes) {
            $routes->connect('/add', ['action' => 'add', '[_method]' => 'POST']);
            $routes->connect('/update', ['action' => 'update', '[_method]' => 'PATCH']);
            $routes->connect('/', ['action' => 'view', '[_method]' => 'GET']);
            $routes->connect('/view', ['action' => 'view', '[_method]' => 'GET']);
            $routes->connect('/viewDetail', ['action' => 'viewDetail', '[_method]' => 'GET']);
            $routes->connect('/delete', ['action' => 'delete', '[_method]' => 'DELETE']);
        });

        $routes->scope('/roles', ['controller' => 'Roles'], function(RouteBuilder $routes) {
            $routes->connect('/add', ['action' => 'add', '[_method]' => 'POST']);
            $routes->connect('/update', ['action' => 'update', '[_method]' => 'PATCH']);
            $routes->connect('/view', ['action' => 'view', '[_method]' => 'GET']);
            $routes->connect('/', ['action' => 'view', '[_method]' => 'GET']);
            $routes->connect('/viewDetail', ['action' => 'viewDetail', '[_method]' => 'GET']);
            $routes->connect('/delete', ['action' => 'delete', '[_method]' => 'DELETE']);
        });
        $routes->fallbacks('DashedRoute');

    }
);
/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
