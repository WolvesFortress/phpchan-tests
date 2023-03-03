<?php

class Game {
    private $entityManager;
    private $eventManager;

    public function __construct() {
        $this->entityManager = new EntityManager();
        $this->eventManager = new EventManager();
    }

    public function registerEntity($entity) {
        $this->entityManager->addEntity($entity);
        $entity->setEventManager($this->eventManager);
    }

    public function start() {
        while (true) {
            // Handle input
            // ...

            // Update entities
            $this->entityManager->updateAll();

            // Render entities
            // ...

            // Sleep to limit framerate
            usleep(10000); // 10ms
        }
    }
}
