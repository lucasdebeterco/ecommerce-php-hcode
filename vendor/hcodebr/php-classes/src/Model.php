<?php

namespace Hcode;

class Model {
    private $values = [];

    public function __call($name, $arguments)
    {
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));

        switch ($method) {
            case "get":
                return $this->values[$fieldName];
            case "set":
                $this->values[$fieldName] = $arguments[0];
                break;
        }
        return true;
    }

    public function setData($data = array()) {
        foreach ($data as $key => $value) {
            $this->{"set" . $key}($value);
        }
    }
}