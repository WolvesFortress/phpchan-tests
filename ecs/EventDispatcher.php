<?php

class EventDispatcher {
    protected $listeners = array();

    function addListener($eventName, $callback) {
        if (!isset($this->listeners[$eventName])) {
            $this->listeners[$eventName] = array();
        }
        $this->listeners[$eventName][] = $callback;
    }

    function dispatch($eventName, $event = null) {
        if (isset($this->listeners[$eventName])) {
            foreach ($this->listeners[$eventName] as $callback) {
                $callback($event);
            }
        }
    }
}
