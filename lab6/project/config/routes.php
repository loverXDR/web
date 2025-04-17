<?php
	use \Core\Route;
	
	return [
		// Root route for the homepage
		new Route('/', 'hello', 'index'),
		
		new Route('/hello/', 'hello', 'index'), // роут для приветственной страницы, можно удалить
		
		// Task 2.1 - TestController routes
		new Route('/test1/', 'test', 'act1'),
		new Route('/test2/', 'test', 'act2'),
		new Route('/test3/', 'test', 'act3'),
		
		// Task 2.2 - NumController route
		new Route('/nums/:n1/:n2/:n3/', 'num', 'sum'),
		
		// Task 2.4-2.7 - UserController routes
		// Important: static routes must come before dynamic ones
		new Route('/user/all/', 'user', 'all'),
		new Route('/user/first/:n/', 'user', 'first'),
		new Route('/user/:id/', 'user', 'show'),
		new Route('/user/:id/:key/', 'user', 'info'),
		
		// Task 3.2-3.4 - ProductController routes
		new Route('/products/all/', 'product', 'all'),
		new Route('/product/:n/', 'product', 'show'),
	];
	
