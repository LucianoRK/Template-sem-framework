<?php

class cookieController
{

    function checkForCookie()
    {
        $id_usuario = SESSION::getSession("id_usuario");
        $fk_empresa = SESSION::getSession("fk_empresa");

        $cookie     = new Cookie;
        $user       = new User;

        $cookies_users = $cookie->getUserCookie($id_usuario, $fk_empresa);

        if ($cookies_users) {
            foreach ($cookies_users as $cookie_user) {
                if (isset($_COOKIE['acesso_sistema']) && $_COOKIE['acesso_sistema'] == $cookie_user['id_cookie']) {
                    return true;
                }
            }
            
            /* VERIFICO SE TEM ACESSO LIBERADO E SE JA USOU TODOS OS ACESSOS */
            $acessos_liberados = $user->getUserAcesso($id_usuario, $fk_empresa);
            $cookies_qtd       = $cookie->getCookieAmount($id_usuario, $fk_empresa);

            if ($cookies_qtd < $acessos_liberados) {
                /* CRIO O COOKIE NO BD E PEGO O ID */
                $id_cookie = $cookie->createCookie($id_usuario, $fk_empresa);
                setcookie('acesso_sistema', $id_cookie, 30);

                return true;
            } else {
                return false;
            }
        } else {
            /* VERIFICO SE TEM ACESSO LIBERADO E CRIO COOKIE */
            if ($user->getUserAcesso($id_usuario, $fk_empresa) >= 1) {
                /* CRIO O COOKIE NO BD E PEGO O ID */
                $id_cookie = $cookie->createCookie($id_usuario, $fk_empresa);
                setcookie('acesso_sistema', $id_cookie, (time() + (3600 * 24 * 365)));

                return true;
            } else {
                return false;
            }
        }
    }
}
