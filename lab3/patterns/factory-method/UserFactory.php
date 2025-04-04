<?php

require_once 'User.php';

// Abstract factory class
abstract class UserFactory {
    abstract public function createUser(array $data): User;

    public function getUser(array $data): User {
        return $this->createUser($data);
    }
}

// Concrete factory for creating users based on type
class ConcreteUserFactory extends UserFactory {
    public function createUser(array $data): User {
        switch ($data['type']) {
            case 'admin':
                return new AdminUser($data);
            case 'manager':
                return new ManagerUser($data);
            case 'customer':
            default:
                return new CustomerUser($data);
        }
    }
} 