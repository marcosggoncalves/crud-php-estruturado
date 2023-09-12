<?php

session_start();

require_once __DIR__ . '../../Config/index.php';

use Teste\Models\Veiculo;
use CoffeeCode\Router\Router;

const viewCadastrar = __DIR__ . '../../views/Veiculos/Cadastrar.php';
const viewDetalhar = __DIR__ . '../../views/Veiculos/Detalhar.php';
const viewListagem = __DIR__ . '../../views/Veiculos/Listagem.php';

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header("Location: {$_ENV["BASE_URL"]}{$url}");
    exit;
}

function listagemVeiculos(){
    $model = new Veiculo();
    $veiculos = $model->all();
    include viewListagem;
}

function detalharInformacoesVeiculo($params){
    $model = new Veiculo();
    $veiculo = $model->get($params['id']);
    include viewDetalhar;
}

function novoVeiculo(){
    include viewCadastrar;
}

function alterarInformacoesVeiculo($params){
    $model = new Veiculo();

    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(empty($data['descricao_veiculo'])){
        $_SESSION['message'] = 'Campo descrição do veiculo precisa ser preenchido!';
        include viewDetalhar;
        return;
    }

    if(empty($data['placa_veiculo'])){
        $_SESSION['message'] = 'Campo placa do veiculo precisa ser preenchido!';
        include viewDetalhar;
        return;
    }

    $veiculo = $model->findById($params['id']);
    $veiculo->placa_veiculo = $data['placa_veiculo'];
    $veiculo->descricao_veiculo = $data['descricao_veiculo'];
    
    $message = $veiculo->save() 
        ? "Alteração realizada com sucesso no veiculo {$data['placa_veiculo']}!" 
        : "Não foi possivel realizar alteração!";
    
    return redirect("", $message);
}

function excluirRegistroVeiculo($params){
    $model = new Veiculo();

    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $excluirVeiculo = $model->findById($params['id']);
    
    $message = $excluirVeiculo->destroy() 
        ? "Veiculo Excluido com sucesso!" 
        : "Não foi possivel excluir Veiculo!";
    
   return redirect("", $message);
}

function cadastrarVeiculo(){
    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    
    if(empty($data['descricao_veiculo'])){
         $_SESSION['message']  = 'Campo descrição do veiculo precisa ser preenchido!';
        include viewCadastrar;
        return;
    }

    if(empty($data['placa_veiculo'])){
        $_SESSION['message']  = 'Campo placa do veiculo precisa ser preenchido!';
        include viewCadastrar;
        return;
    }

    $novoVeiculo = new Veiculo();
    $novoVeiculo->placa_veiculo = $data['placa_veiculo'];
    $novoVeiculo->descricao_veiculo = $data['descricao_veiculo'];

    $message = $novoVeiculo->save() 
        ? "Veiculo Cadastrado com sucesso!" 
        : "Não foi possivel cadastrar novo veiculo!";
    
    return redirect("", $message);
}
