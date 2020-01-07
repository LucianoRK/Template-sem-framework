<?php

class homeController
{
    public function index()
    {
        echo "<h1> INDEX </h1>";
        $log = new LOG();
        $user = 1;
        var_dump($log->getLogForUser($user));
    }

    public function teste()
    {
        echo "<h1> TESTE </h1>";
    }
}
