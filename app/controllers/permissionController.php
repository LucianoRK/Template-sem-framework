<?php

class permissionController extends CONTROLLER
{
    public function index()
    {
        $dados = array();
        $this->loadTemplate('permission/permission', $dados);
    }
}
