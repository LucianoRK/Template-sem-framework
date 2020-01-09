<?php

class notfoundController extends controller
{

    public function index()
    {
        $this->loadView('notfound/error404', array());
    }
}
