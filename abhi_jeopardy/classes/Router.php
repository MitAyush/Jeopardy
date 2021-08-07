<?php

/**
 * 
 */
namespace Classes;
use FastRoute\Dispatcher;
class Router
{		
	
	function __construct()
	{
		$dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {

			// auth routers
		    $r->addRoute('GET', '/jeopardy/abc/{id:\d+}/{username}', 'get_all_users_handler');
		    $r->addRoute('GET', '/jeopardy/login', 'viewLogin@UserAuth');
		    $r->addRoute('POST', '/jeopardy/doLogin', 'doLogin@UserAuth');
		    $r->addRoute('POST', '/jeopardy/doRegister', 'doRegister@UserAuth');
		    $r->addRoute('GET', '/jeopardy/register', 'viewRegister@UserAuth');
		    $r->addRoute('POST', '/jeopardy/checkUsername', 'checkUsername@UserAuth');
		    $r->addRoute('GET', '/jeopardy/logout', 'logout@UserAuth');

		    // admin
		    $r->addRoute('GET', '/jeopardy/admin', 'show@Admin');
		    $r->addRoute('POST', '/jeopardy/insert/Sports', 'addSports@Admin');
		    $r->addRoute('POST', '/jeopardy/insert/Editorial', 'addEditorial@Admin');
		    $r->addRoute('POST', '/jeopardy/insert/Trailer', 'addTrailer@Admin');
		    $r->addRoute('POST', '/jeopardy/insert/Technology', 'addTechnology@Admin');

			// userdashboard
			$r->addRoute('GET', '/jeopardy/homepage', 'homepage@User');

		    // game
		    $r->addRoute('GET', '/jeopardy/game', 'show@Game');


		    $r->addRoute('GET', '/jeopardy/', 'show@Dashboard');
		 
		    $r->addRoute('POST', '/jeopardy/checkResponse', 'checkResponse@Game');


















		    // {id} must be a number (\d+)
		    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
		    // The /{title} suffix is optional
		    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
		});

		// Fetch method and URI from somewhere
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		// Strip query string (?foo=bar) and decode URI
		if (false !== $pos = strpos($uri, '?')) {
		    $uri = substr($uri, 0, $pos);
		}

		$uri = rawurldecode($uri);

		$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
		switch ($routeInfo[0]) {
		    case \FastRoute\Dispatcher::NOT_FOUND:
		        // ... 404 Not Found
		        echo "Not found<br>";
		        print_r($routeInfo);
		        break;
		    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
		        $allowedMethods = $routeInfo[1];
		        // ... 405 Method Not Allowed
		        echo "method not allowed";
		        break;
		    case \FastRoute\Dispatcher::FOUND:
		        $handler = $routeInfo[1];
		        $vars = $routeInfo[2];

		        $arr = explode("@", $handler);
		        $controller = $arr[1];
		        $methodName = $arr[0];

		        $controller = "Classes\\".$controller;

		        // check if iscallable
				// method_exists()
		        if (method_exists($controller, $methodName)) {
		        	call_user_func_array([new $controller, $methodName], [$vars]);
		        	
		        }
		        else{
		        	print_r("Controller or method does not exist ");
		        }
		        break;
		}

	}
}