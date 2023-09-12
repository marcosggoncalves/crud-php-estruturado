<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '../../Components/Head.inc' ?>
<body>
    <?php include  __DIR__ .  '../../Components/Header.inc' ?>
    <main class="container">
     <?php include  __DIR__ .  '../../Components/Msg.inc' ?>
        <div class="listagem-veiculos">
            <h1>Lista de veiculos</h1>
            <div class="container-botao">
                <a href="<?=$_ENV["BASE_URL"]?>/veiculo/novo-cadastro">Novo Cadastro</a>
            </div>
            <?php if(!empty($content)):?>
                <?php foreach ($content as $veiculo): ?>
                    <div class="container-veiculo">
                        <div class="container-img">
                            <img
                                src="https://static.vecteezy.com/system/resources/previews/013/923/536/non_2x/car-sports-logo-black-png.png">
                        </div>
                        <div class="container-info">
                            <ul>
                                <li>Placa:
                                    <?= $veiculo->placa_veiculo; ?>
                                </li>
                                <li>Descrição:
                                    <?= $veiculo->descricao_veiculo; ?>
                                </li>
                                <li class="li-option">
                                    <a class="editar" href="<?=$_ENV["BASE_URL"]?>/veiculo/detalhar/<?=$veiculo->id?>">Editar</a>
                                    <a class="excluir" href="<?=$_ENV["BASE_URL"]?>/veiculo/excluir-cadastro/<?=$veiculo->id?>">Excluir</a>
                                </li>
                            </ul>
                        </div>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
    </main>
</body>
</html>