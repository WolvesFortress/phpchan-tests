<?php

use PositionComponent;

class PositionChangedEvent implements Event
{
    private PositionComponent $position;

    public function __construct(PositionComponent $position)
    {
        $this->position = $position;
    }

    public function getPosition(): PositionComponent
    {
        return $this->position;
    }
}