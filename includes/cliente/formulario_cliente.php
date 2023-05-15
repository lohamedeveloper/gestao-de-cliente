<main>

    <?= $mensagem ?>

    <section>
        <a href="index.php">
            <button class="btn btn-secondary my-4">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3">Cadastrar Cliente</h2>

    <form method="POST">

        <div class="form-group">
            <label">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?= $obCliente->nome;?>">
        </div>
        <div class="form-group">
            <label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $obCliente->cpf;?>">
        </div>
        <div class="form-group">
            <label">RG</label>
            <input type="text" class="form-control" name="rg" value="<?= $obCliente->rg;?>">
        </div>
        <div class="form-group">
            <label">Data Nascimento</label>
            <input type="date" class="form-control" name="dataNascimento" value="<?= $obCliente->dataNascimento;?>">
        </div>
        <div class="form-group">
            <label">Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?= $obCliente->telefone;?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success my-4">Enviar</button>
        </div>
    </form>

</main>