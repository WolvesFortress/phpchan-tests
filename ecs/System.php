<?php

class System {
    protected $entityManager;

    function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    function update() {}
}
