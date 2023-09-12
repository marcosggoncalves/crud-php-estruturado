<?php

require_once __DIR__ . '../../src/Config/index.php';
require_once __DIR__ . '../../src/Routes/Veiculos.php';

use Teste\Controllers;
use CoffeeCode\Router\Router;

$router = new Router(getenv('BASE_URL'));

$router->group(null);

$router->get("/", "listagemVeiculos"); 
$router->get("/veiculo/novo-cadastro", "novoVeiculo"); 
$router->post("/veiculo/cadastrar", "cadastrarVeiculo");
$router->get("/veiculo/detalhar/{id}", "detalharInformacoesVeiculo"); 
$router->post("/veiculo/alterar-cadastro/{id}", "alterarInformacoesVeiculo");  
$router->get("/veiculo/excluir-cadastro/{id}", "excluirRegistroVeiculo");  

if ($router->error()) echo $router->error();

$router->dispatch();