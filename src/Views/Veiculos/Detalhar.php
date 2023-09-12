<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '../../Components/Head.inc' ?>
<body>
    <?php include  __DIR__ .  '../../Components/Header.inc' ?>
    <main class="container">
    <?php include  __DIR__ .  '../../Components/Msg.inc' ?>
        <div class="container-formulario">
            <h1>Veiculo: #<?=$content->placa_veiculo?></h1>
            <form class="formulario" action="<?=$_ENV["BASE_URL"]?>veiculo/alterar-cadastro/<?=$content->id?>" method="post">
                <div class="container-input-row">
                <div class="container-input">
                        <label for="descricao_veiculo">ID:</label>
                        <input type="text" value="<?=$content->id?>" name="id" id="id" readonly>
                    </div>
                    <div class="container-input">
                        <label for="descricao_veiculo">Descrição</label>
                        <input type="text" value="<?=$content->descricao_veiculo?>" name="descricao_veiculo" placeholder="Descreva o veiculo"
                            id="descricao_veiculo">
                    </div>
                    <div class="container-input">
                        <label for="placa_veiculo">Placa:</label>
                        <input type="text" value="<?=$content->placa_veiculo?>" name="placa_veiculo" placeholder="placa do veiculo" id="placa_veiculo">
                    </div>
                </div>
                <div class="container-input">
                    <input type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>