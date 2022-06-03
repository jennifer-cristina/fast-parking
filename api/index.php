<?php

/*****************************************************************************************************************
 * Objetivo: Arquivo principal da API que irá receber a URL requisitada e redirecionar para as APIs (router)
 * Data: 02/06/2022
 * Autor:
 * Versão:1.0
 ****************************************************************************************************************/

//Permite ativar quais páginas/endereços de sites que poderão fazer requisições na API 
//(* libera para todos os sites) 
header('Access-Control-Allow-Origin: *');

//Permite ativar os metodos do HTTP que irão requisitar a API
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

//Permite ativar o Content-Type das requisições(Formato de dados que será utilizado(JSON,XML,FORM/DATA,etc...))
header('Access-Control-Allow-Header: Content-Type');

//Permite liberar quais Content-Type serão utilizados na API
header('Content-Type: application/json');

//Recebe a url digitada na requisição
$urlHTTP = (string) $_GET['url'];

//Converte a url requisitada em um array para dividir as opções de busca, que é separada pela barra
$url = explode('/', $urlHTTP);

//Verifica qual API será encaminhada a requisição (contatos,estados,etc)
switch (strtoupper($url[0])) {
    case 'VAGA':
        require_once('vagaAPI/index.php');
        break;
    case 'BLOCO':
        require_once('blocoAPI/index.php');
        break;
    case 'TIPOVAGA':
        require_once('tipovagaAPI/index.php');
        break;
}
