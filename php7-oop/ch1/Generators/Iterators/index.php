<?php

/**
 * Iterator Interface Implements
 */
class IntegerIterator implements Iterator
{
    private $i;

    /**
     * Create a new IetegerIterator
     *
     * @param int $start
     * @param int $end
     * @param int $step
     *
     * @return IntegerIterator
     */
    public function __construct($start, $end, $step = 1)
    {
        $this->start = $i = $start;
        $this->end = $end;
        $this->step = $step;
    }

    /**
     * Reset
     */
    public function rewind()
    {
        $this->i = 0;
    }

    /**
     * Validate
     */
    public function valid()
    {
        return $this->i <= $this->end;
    }

    /**
     * Get a Current Value
     */
    public function current()
    {
        return $this->i;
    }

    /**
     * Get a key
     */
    public function key()
    {
        return $this->i;
    }

    /**
     * Next step
     */
    public function next()
    {
        $this->i += $this->step;
    }
}

foreach (new IntegerIterator(0, 100) as $number) {
}
