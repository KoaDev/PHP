<?php

class ClassLoader
{
    public $class;
    public $root = 'class/';

    public function __construct()
    {
        $this->getFile();
    }

    private function getFile()
    {
        $this->class = scandir($this->root);
    }

    public function loadedFile()
    {
        echo json_encode($this->class);
    }

    public function register()
    {
        for ($i = 0; $i <= 1; $i++)
        {
            array_splice($this->class, 0, 1);
        }

        foreach ($this->class as $file)
        {
           require_once($this->root . $file);
        }
    }

}