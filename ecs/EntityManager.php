<?php

class EntityManager {
    protected $entities = array();
    protected $eventDispatcher;

    function __construct() {
        $this->eventDispatcher = new EventDispatcher();
    }

    function createEntity() {
        $entity = new Entity();
        $this->entities[] = $entity;
        return $entity;
    }

    function removeEntity($entity) {
        $key = array_search($entity, $this->entities, true);
        if ($key !== false) {
            unset($this->entities[$key]);
        }
    }

    function getEntities() {
        return $this->entities;
    }

    function addListener($eventName, $callback) {
        $this->eventDispatcher->addListener($eventName, $callback);
    }

    function dispatch($eventName, $event = null) {
        $this->eventDispatcher->dispatch($eventName, $event);
    }
}
