<?php

declare(strict_types=1);

namespace App\Components;

use App\Events\PositionChangedEvent;

class PositionComponent implements ComponentInterface
{
    private float $x;
    private float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function setX(float $x): void
    {
        $this->x = $x;
        EventDispatcher::dispatch(new PositionChangedEvent($this));
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function setY(float $y): void
    {
        $this->y = $y;
        EventDispatcher::dispatch(new PositionChangedEvent($this));
    }

    public function getPosition(): array
    {
        return ['x' => $this->x, 'y' => $this->y];
    }
}
