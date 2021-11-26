<?php

if (!defined('ZBP_PATH')) {
    exit('Access denied');
}

class ZbpLangs
{

    private $item = null;

    private $array = array();

    public function __construct(&$array, $name = '')
    {
        if (is_array($array)) {
            $this->array = &$array;
            $this->item = $name;
        } else {
            $this->item = $array;
        }
    }

    public function __toString()
    {
        return (string) $this->item;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->array)) {
            if (is_array($this->array[$name])) {
                return new ZbpLangs($this->array[$name], $name);
            } else {
                return $this->array[$name];
                //return new ZbpLangs($this->array[$name]);
            }
        } else {
            return new ZbpLangs($name);
        }
    }

    public function __isset($name)
    {
        return array_key_exists($name, $this->array);
    }

}
