<?php
global $routes;
$routes = array();

/* LOGIN */ {
    $routes['/logar']            = '/login/index';
    $routes['/entrando/sistema'] = '/login/logInto';
}

/* HOME */ {
    $routes['/']     = '/home/index';
    $routes['/home'] = '/home/index';
    $routes['/sair'] = '/home/exit_system';
}

/* USUARIO */ {
    $routes['/usuarios'] = '/user/index';
}

/* PERMISSOES */ {
    $routes['/permissoes'] = '/permission/index';
}


// EX:
//$routes['/news/{id}/{id2}'] = '/noticia/abrir/:id/:id';


// SE A ROTA NÃO EXISTIR REDIRECIONA PARA 404
$routes['/{titulo}'] = '/notfound/index';
