<?php

declare(strict_types=1);

namespace MyProject\Classes;

require_once __DIR__ . '/AbstractUser.php';

/**
 * Class User
 * Represents a basic user in the system
 * 
 * @package MyProject\Classes
 */
class User extends AbstractUser
{
    /** @var string User's name */
    public string $name;
    
    /** @var string User's login */
    public string $login;
    
    /** @var string User's password */
    private string $password;

    /** @var int Counter for number of User instances */
    private static int $userCount = 0;

    /**
     * User constructor
     * 
     * @param string $name User's name
     * @param string $login User's login
     * @param string $password User's password
     */
    public function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$userCount++;
    }

    /**
     * Display user information
     * 
     * @return void
     */
    public function showInfo(): void
    {
        echo "User Information:\n";
        echo "Name: {$this->name}\n";
        echo "Login: {$this->login}\n";
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        echo "Пользователь {$this->login} удален.\n";
    }

    /**
     * Get the total number of User instances
     * 
     * @return int
     */
    public static function getUserCount(): int
    {
        return self::$userCount;
    }
} 