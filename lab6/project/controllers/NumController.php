<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class NumController extends Controller
	{
		public function sum($params) {
			$this->title = 'Sum Calculator';
			
			$n1 = (int)$params['n1'];
			$n2 = (int)$params['n2'];
			$n3 = (int)$params['n3'];
			
			$sum = $n1 + $n2 + $n3;
			
			return $this->render('num/sum', [
				'n1' => $n1,
				'n2' => $n2,
				'n3' => $n3,
				'sum' => $sum
			]);
		}
	} 