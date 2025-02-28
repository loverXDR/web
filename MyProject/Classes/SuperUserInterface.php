<?php

declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Interface SuperUserInterface
 * Defines the contract for super users
 * 
 * @package MyProject\Classes
 */
interface SuperUserInterface
{
    /**
     * Get user information as an associative array
     * 
     * @return array
     */
    public function getInfo(): array;
} 