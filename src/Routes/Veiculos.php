<?php

session_start();

require_once __DIR__ . '../../Config/index.php';
require_once __DIR__ . '../../Utils/index.php';

use Teste\Models\Veiculo;

function listagemVeiculos(){
    $model = new Veiculo();
    $veiculos = $model->all();
    return render('Listagem', $veiculos);
}

function detalharInformacoesVeiculo($params){
    $model = new Veiculo();
    $veiculo = $model->get($params['id']);
    return  render('Detalhar', $veiculo);
}

function novoVeiculo(){
    return render('Cadastrar');
}

function alterarInformacoesVeiculo($params){
    $model = new Veiculo();

    $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(empty($data['descricao_veiculo'])){
        $message = 'Campo descrição do veiculo precisa ser preenchido!';
        return redirect("veiculo/detalhar/{$params['id']}", $message);
    }

    if(empty($data['placa_veiculo'])){
        $message = 'Campo placa do veiculo precisa ser preenchido!';
        return redirect("veiculo/detalhar/{$params['id']}", $message);
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
        return render('Cadastrar');
    }

    if(empty($data['placa_veiculo'])){
        $_SESSION['message']  = 'Campo placa do veiculo precisa ser preenchido!';
        return render('Cadastrar');
    }

    $novoVeiculo = new Veiculo();
    $novoVeiculo->placa_veiculo = $data['placa_veiculo'];
    $novoVeiculo->descricao_veiculo = $data['descricao_veiculo'];

    $message = $novoVeiculo->save() 
        ? "Veiculo Cadastrado com sucesso!" 
        : "Não foi possivel cadastrar novo veiculo!";
    
    return redirect("", $message);
}
