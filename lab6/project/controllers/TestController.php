<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class TestController extends Controller
	{
		public function act1() {
			$this->title = 'Test Action 1';
			return $this->render('test/act1', [
				'message' => 'This is Test Action 1'
			]);
		}
		
		public function act2() {
			$this->title = 'Test Action 2';
			return $this->render('test/act2', [
				'message' => 'This is Test Action 2'
			]);
		}
		
		public function act3() {
			$this->title = 'Test Action 3';
			return $this->render('test/act3', [
				'message' => 'This is Test Action 3'
			]);
		}
	} 