<?php

class IndexController
{
    function index()
    {
        $template = new Template();
        $template->setLayout('default');
        $template->render("index");
    }
}