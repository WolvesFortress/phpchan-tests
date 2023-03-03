<?php

class EventManager {
    private $listeners = [];

    public function registerListener($eventName, $listener) {
        $this->listeners[$eventName][] = $listener;
    }

    public function triggerEvent($eventName, $eventData = []) {
        if (isset($this->listeners[$eventName])) {
            foreach ($this->listeners[$eventName] as $listener) {
                $listener($eventData);
            }
        }
    }
}
