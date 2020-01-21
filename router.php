<?php
global $routes;
$routes = array();

if (SESSION::checkLoggedInUser()) {
    /* HOME */ {
        $routes['/']     = '/home/index';
        $routes['/home'] = '/home/index';
        $routes['/sair'] = '/home/exit_system';
    }

    /* MY ACCOUNT */ {
        $routes['/minha/conta']         = '/myaccount/index';
        $routes['/alterar/minha/senha'] = '/myaccount/changeMyPassword';
    }

    /* USER */ {
        $routes['/usuarios']                     = '/user/index';
        $routes['/usuarios/getListActiveUsers']  = '/user/getListActiveUsers';
        $routes['/usuarios/getListDisableUsers'] = '/user/getListDisableUsers';
        $routes['/usuarios/newUser']             = '/user/newUser';
        $routes['/usuarios/editUser']            = '/user/editUser';
        $routes['/usuarios/saveUserData']        = '/user/saveUser';
        $routes['/usuarios/deleteUser']          = '/user/deleteUser';
        $routes['/usuarios/reactivateUser']      = '/user/reactivateUser';
        $routes['/usuarios/buscar/cidades']      = '/user/showCities';
    }

    /* PERMISSION */ {
        $routes['/permissoes'] = '/permission/index';
    }
}

/* LOGIN */ {
    $routes['/logar']            = '/login/index';
    $routes['/entrando/sistema'] = '/login/logInto';
}

// EX:
//$routes['/news/{id}/{id2}'] = '/noticia/abrir/:id/:id';


// SE A ROTA NÃO EXISTIR REDIRECIONA PARA 404
$routes['/{titulo}'] = '/notfound/index';
