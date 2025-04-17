<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class UserController extends Controller
	{
		private $users;
		
		public function __construct() {
			$this->users = [
				1 => ['name'=>'user1', 'age'=>'23', 'salary' => 1000],
				2 => ['name'=>'user2', 'age'=>'24', 'salary' => 2000],
				3 => ['name'=>'user3', 'age'=>'25', 'salary' => 3000],
				4 => ['name'=>'user4', 'age'=>'26', 'salary' => 4000],
				5 => ['name'=>'user5', 'age'=>'27', 'salary' => 5000],
			];
		}
		
		public function show($params) {
			$this->title = 'User Information';
			
			$id = (int)$params['id'];
			
			if (isset($this->users[$id])) {
				$user = $this->users[$id];
				return $this->render('user/show', [
					'id' => $id,
					'user' => $user
				]);
			} else {
				return $this->render('error/index', [
					'message' => 'User not found'
				]);
			}
		}
		
		public function info($params) {
			$this->title = 'User Details';
			
			$id = (int)$params['id'];
			$key = $params['key'];
			
			if (isset($this->users[$id]) && isset($this->users[$id][$key])) {
				$value = $this->users[$id][$key];
				return $this->render('user/info', [
					'id' => $id,
					'key' => $key,
					'value' => $value
				]);
			} else {
				return $this->render('error/index', [
					'message' => 'User or key not found'
				]);
			}
		}
		
		public function all() {
			$this->title = 'All Users';
			
			return $this->render('user/all', [
				'users' => $this->users
			]);
		}
		
		public function first($params) {
			$this->title = 'First N Users';
			
			$n = (int)$params['n'];
			$firstUsers = array_slice($this->users, 0, $n, true);
			
			return $this->render('user/first', [
				'n' => $n,
				'users' => $firstUsers
			]);
		}
	} 