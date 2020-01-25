<?php

class callController extends CONTROLLER
{
    public function index()
    {
        $dados            = array();
        $company          = new Company;
        $dados['company'] = $company->getAllCompanyByUser(SESSION::getSession('id_usuario'));

        if (!$dados['company']) {
            $dados['company'] = $company->getInfoCompany(SESSION::getSession('fk_empresa'));
        }

        $this->loadTemplate('call/call', $dados);
    }

    function newCall()
    {
        $dados              = array();
        $company            = new Company;
        $cat_chamado        = new CategoriasChamados;

        $dados['company']       = $company->getAllCompanyByUser(SESSION::getSession('id_usuario'));
        $dados['cat_chamado']   = $cat_chamado->getAllCategories();

        if (!$dados['company']) {
            $dados['company'] = $company->getInfoCompany(SESSION::getSession('fk_empresa'));
        }

        $this->loadView('call/newCallLoad', $dados);
    }
}
