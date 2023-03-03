<?php

class Entity {
    public $components = array();

    function addComponent($component) {
        $componentName = get_class($component);
        $this->components[$componentName] = $component;
        $component->entity = $this;
    }

    function getComponent($componentName) {
        return $this->components[$componentName];
    }

    function hasComponent($componentName) {
        return array_key_exists($componentName, $this->components);
    }

    function removeComponent($componentName) {
        if ($this->hasComponent($componentName)) {
            unset($this->components[$componentName]);
        }
    }
}
