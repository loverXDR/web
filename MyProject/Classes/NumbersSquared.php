<?php

declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Class NumbersSquared
 *
 * Implements an iterator that generates squares of numbers within a given range.
 */
class NumbersSquared implements \Iterator
{
    private int $start;
    private int $end;
    private int $current;

    /**
     * Constructor for NumbersSquared.
     *
     * @param int $start The starting number of the sequence.
     * @param int $end   The ending number of the sequence.
     */
    public function __construct(int $start, int $end)
    {
        $this->start = $start;
        $this->end = $end;
        // Initialize current to start upon creation, or handle rewind logic explicitly
        $this->current = $this->start;
    }

    /**
     * Rewind the Iterator to the first element.
     */
    public function rewind(): void
    {
        $this->current = $this->start;
    }

    /**
     * Check if current position is valid.
     *
     * @return bool True if the current position is valid, false otherwise.
     */
    public function valid(): bool
    {
        return $this->current <= $this->end;
    }

    /**
     * Move forward to the next element.
     */
    public function next(): void
    {
        $this->current++;
    }

    /**
     * Return the key of the current element.
     *
     * @return int The current number in the sequence.
     */
    public function key(): int
    {
        return $this->current;
    }

    /**
     * Return the current element (the square of the current number).
     *
     * @return int The square of the current number.
     */
    public function current(): int
    {
        return $this->current * $this->current;
    }
} 