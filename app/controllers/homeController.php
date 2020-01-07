<?php

class homeController extends CONTROLLER
{

    public function index()
    {
        $dados = array();
        $this->loadView('home/home', $dados);
    }
}
