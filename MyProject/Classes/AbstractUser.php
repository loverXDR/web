<?php

declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Abstract Class AbstractUser
 * Base class for all user types
 * 
 * @package MyProject\Classes
 */
abstract class AbstractUser
{
    /**
     * Display user information
     * 
     * @return void
     */
    abstract public function showInfo(): void;
} 