<?php

class notfoundController extends controller
{

    function index()
    {
        $this->loadView('notfound/error404', array());
    }
}
