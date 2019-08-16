<?php

class HelloController
{
    function index()
    {
        $template = new Template();
        $template->setLayout('default');
        $template->render("index");
    }
    function greet($name)
    {
        require(ROOT . 'Application/Models/Hello.php');

        $hello = new Hello();
        $template = new Template();

        $data['greeting'] = $hello->getGreetings($name);
        $template->setData($data);
        //$template->setLayout('default');
        $template->render("greet");
    }
}