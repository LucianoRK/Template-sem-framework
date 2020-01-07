<?php

class homeController extends CONTROLLER
{

    function index()
    {
        $dados = array();
        $this->loadTemplate('home/home', $dados);
    }
}