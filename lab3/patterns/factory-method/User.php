<?php

// User interface
interface User {
    public function getId(): int;
    public function getName(): string;
    public function getEmail(): string;
    public function getType(): string;
    public function getInfo(): string;
}

// Admin user
class AdminUser implements User {
    private $id;
    private $name;
    private $email;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getType(): string {
        return 'admin';
    }

    public function getInfo(): string {
        return "ADMIN: {$this->name} (ID: {$this->id}) - {$this->email}";
    }
}

// Customer user
class CustomerUser implements User {
    private $id;
    private $name;
    private $email;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getType(): string {
        return 'customer';
    }

    public function getInfo(): string {
        return "CUSTOMER: {$this->name} (ID: {$this->id}) - {$this->email}";
    }
}

// Manager user
class ManagerUser implements User {
    private $id;
    private $name;
    private $email;

    public function __construct(array $data) {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getType(): string {
        return 'manager';
    }

    public function getInfo(): string {
        return "MANAGER: {$this->name} (ID: {$this->id}) - {$this->email}";
    }
} 