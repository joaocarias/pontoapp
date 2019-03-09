<?php

namespace App\Models;

class ItemString {
    public $id;
    public $texto;
    public $icon;
    public $link;
    public $controller;
    public $action;
    
    function __construct($id, $texto, $icon = null, $link = null, $controller = null, $action = null) {
        $this->id = $id;
        $this->texto = $texto;
        $this->icon = $icon;
        $this->link = $link;
        $this->controller = $controller;
        $this->action = $action;
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
        
    function getTexto() {
        return $this->texto;
    }

    function getIcon() {
        return $this->icon;
    }

    function getLink() {
        return $this->link;
    }

    function getController() {
        return $this->controller;
    }

    function getAction() {
        return $this->action;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setIcon($icon) {
        $this->icon = $icon;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setController($controller) {
        $this->controller = $controller;
    }

    function setAction($action) {
        $this->action = $action;
    }    
}
