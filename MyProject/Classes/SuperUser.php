<?php

declare(strict_types=1);

namespace MyProject\Classes;

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/SuperUserInterface.php';

/**
 * Class SuperUser
 * Represents a user with elevated privileges
 * 
 * @package MyProject\Classes
 */
class SuperUser extends User implements SuperUserInterface
{
    /** @var string User's role */
    public string $role;

    /** @var int Counter for number of SuperUser instances */
    private static int $superUserCount = 0;

    /**
     * SuperUser constructor
     * 
     * @param string $name User's name
     * @param string $login User's login
     * @param string $password User's password
     * @param string $role User's role
     */
    public function __construct(string $name, string $login, string $password, string $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$superUserCount++;
    }

    /**
     * Display user information including role
     * 
     * @return void
     */
    public function showInfo(): void
    {
        parent::showInfo();
        echo "Role: {$this->role}\n";
    }

    /**
     * Get all user information as an associative array
     * 
     * @return array
     */
    public function getInfo(): array
    {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'role' => $this->role
        ];
    }

    /**
     * Get the total number of SuperUser instances
     * 
     * @return int
     */
    public static function getSuperUserCount(): int
    {
        return self::$superUserCount;
    }
} 