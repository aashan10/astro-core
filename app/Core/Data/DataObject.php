<?php

namespace Astro\Core\Data;

trait DataObject
{
    protected $data = [];

    public function getData(string $key = null)
    {
        return $this->data[$key] ?? $this->data;
    }

    public function setData(string $key, $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function __get($name)
    {
        return $this->getData($name);
    }

    public function __set($name, $value)
    {
        return $this->setData($name, $value);
    }

    public function __call($name, $arguments)
    {
        $getterSetter = substr($name, 0 , 3);
        $actualName = $this->convertPascalCaseToSnakeCase(substr($name, 2));
        switch ($getterSetter) {
            case 'get':
                return $this->getData($actualName);
            case 'set':
                return $this->setData($actualName, $arguments);
            default:
                throw new \BadMethodCallException();
        }
    }

    private function convertPascalCaseToSnakeCase(string $pascalCase): string
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $pascalCase, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }
}