<?php
	namespace Project\Controllers;
	use \Core\Controller;
	// Removing database model import
	// use \Project\Models\Hello;
	
	class HelloController extends Controller
	{
		public function index() {
			$this->title = 'Фреймворк работает!';
			
			// Removing database access
			// $hello = new Hello;
			
			return $this->render('hello/index');
		}
	}
