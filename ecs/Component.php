<?php

class Component {
    public $entity;

    function __construct($params = array()) {
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
    }

    function update() {}
}
