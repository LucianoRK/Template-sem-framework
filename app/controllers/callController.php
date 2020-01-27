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

    function saveCall() 
    {
        $erros          = array();
        $retorno        = array();
        $_POST          = ARRAYS::unserializeForm($_POST['dados']);
        $fk_empresa     = VALIDATION::post('empresa');
        $fk_categoria   = VALIDATION::post('empresa');
        $descricao      = VALIDATION::post('descricao');


        if (!$fk_empresa) {
            $erros['campos']    = "empresa";
            $erros['msgs']      = "Por favor, selecione uma empresa";
            $retorno[]          = $erros;
        }

        if (!$fk_categoria) {
            $erros['campos']    = "categoria";
            $erros['msgs']      = "Por favor, selecione uma categoria";
            $retorno[]          = $erros;
        }

        if (!$descricao) {
            $erros['campos']    = "descricao";
            $erros['msgs']      = "Por favor, descreva o problema ou a dúvida";
            $retorno[] = $erros;
        } else if (strlen($descricao) <= 20) {
            $erros['campos']    = "descricao";
            $erros['msgs']      = "Por favor, o campo descrição deve conter ao menos 20 carácter";
            $retorno[]    = $erros;
        }

        echo json_encode($retorno);
    }
}
