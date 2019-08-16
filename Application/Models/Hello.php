<?php
class Hello extends Model
{
    public function getGreetings($name)
    {
        return "Hello ". $name;
    }
}