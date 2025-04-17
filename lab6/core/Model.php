<?php
	namespace Core;
	
	class Model
	{
		private static $link;
		
		public function __construct()
		{
			// Try to connect only if database credentials are provided
			if (!self::$link && DB_USER && DB_NAME) {
				try {
					self::$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
					if (self::$link) {
						mysqli_query(self::$link, "SET NAMES 'utf8'");
					}
				} catch (\Exception $e) {
					// Silently fail but log the error
					error_log("Database connection failed: " . $e->getMessage());
				}
			}
		}
		
		protected function findOne($query)
		{
			if (!self::$link) {
				return [];
			}
			$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
			return mysqli_fetch_assoc($result);
		}
		
		protected function findMany($query)
		{
			if (!self::$link) {
				return [];
			}
			$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
			for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
			
			return $data;
		}
	}
