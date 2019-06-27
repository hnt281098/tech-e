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

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

// Tạo router users
Router::scope('/users', ['controller'=>'users'], function(RouteBuilder $routes){
	$routes->connect('/login', ['action'=>'login', 'plugin' => 'backend']);
	$routes->connect('/register', ['action'=>'register', 'plugin' => 'backend']);
	$routes->connect('/logout', ['action'=>'logout', 'plugin' => 'backend']);
	$routes->connect('/forgot-password', ['action'=>'forgotPassword']);
	$routes->connect(
		'/my-profile', 
		['action'=>'myProfile'],
	);
	$routes->connect(
		'/articles-by-user/:id',
		['action'=>'articlesByUser'],
		['pass'=>['id']]
	);
	$routes->connect(
		'/user-details/:id', 
		['action'=>'userDetails'],
		['pass'=>['id']]
	);
});

//Tạo router error
Router::scope('/error', ['controller'=>'error'], function(RouteBuilder $routes){
	$routes->connect('/404', ['action'=>'error404']);
	$routes->connect('/503', ['action'=>'error503']);
});

//Tạo router information
Router::scope('/informations', ['controller'=>'informations'], function(RouteBuilder $routes){
	$routes->connect('/about', ['action'=>'about']);
	$routes->connect('/terms-conditions', ['action'=>'termsConditions']);
});

//Tạo router articles
Router::scope('/articles', ['controller'=>'articles'], function(RouteBuilder $routes){
	$routes->connect(
		'/standard/:standard/:id',
		['action'=>'articlesByStandard'],
		['pass'=>['standard', 'id']]
	);
	$routes->connect('/articles-most-view', ['action'=>'articlesMostView']);
	$routes->connect('/list', ['action'=>'articlesList']);
	$routes->connect(
		'/details/:id',
		['action'=>'articlesDetails'],
		['pass'=>['id'], 'id'=>'[0-9]+']
	);
	$routes->connect('/search', ['action'=>'articlesSearch']);
	$routes->connect('/by', ['action'=>'articlesBy']);
});

//Tạo router categories
Router::scope('/categories', ['controller'=>'categories'], function(RouteBuilder $routes){
	$routes->connect('/categories-list', ['action'=>'categoriesList']);
	$routes->connect(
		'/articles-by-category/:id',
		['action'=>'articlesByCategory'],
		['pass'=>['id']]
	);
});

//Tạo router searches
Router::scope('/searches', ['controller'=>'searches'], function(RouteBuilder $routes){
	$routes->connect('/top-searches', ['action'=>'topSearches']);
	$routes->connect('/', ['action'=>'search']);
});

//Tạo router comments
Router::scope('/comments', ['controller'=>'comments'], function(RouteBuilder $routes){
	$routes->connect(
		'/write-comment/:articleid', 
		['action'=>'writeComment'],
		['pass'=>['articleid']]
	);
	$routes->connect('/commentList', ['action' => 'commentList']);
});

//Tạo router feedbacks
Router::scope('/feedbacks', ['controller'=>'feedbacks'], function(RouteBuilder $routes){
	$routes->connect('/send-feedback', ['action'=>'sendFeedback']);
});

//Tạo router pages
Router::scope('/', function ($routes) {
	// Connect other routes.
	$routes->connect('/',['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/backend', ['controller' => 'AdminUsers', 'plugin' => 'backend', 'action' => 'login']);
});
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
