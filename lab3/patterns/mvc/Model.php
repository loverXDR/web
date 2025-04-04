<?php

class Model {
    protected $data;
    
    public function __construct() {
        // Initialize with some default data
        $this->data = [];
    }
    
    public function loadData(array $data) {
        $this->data = $data;
    }
    
    public function getData() {
        return $this->data;
    }
}

class UserModel extends Model {
    public function __construct() {
        parent::__construct();
        
        // Load user data from the file
        $this->loadData(require_once __DIR__ . '/../factory-method/users.php');
    }
    
    public function getUserById($id) {
        foreach ($this->data as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }
        return null;
    }
    
    public function getUsersByType($type) {
        return array_filter($this->data, function($user) use ($type) {
            return $user['type'] == $type;
        });
    }
} 