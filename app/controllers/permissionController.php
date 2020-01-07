<?php

class permissionController extends CONTROLLER
{
    public function index()
    {
        $dados = array();
        $this->loadView('permission/permission', $dados);
    }
}
