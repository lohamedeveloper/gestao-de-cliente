<main>

    <h2 class="mt-3">Excluir Cliente</h2>

    <form method="POST">

        <div class="form-group">
          <p>Voçê deseja realmente excluir cliente <strong><?= $obCliente->nome?></strong> ?</p> 
        </div>

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-secondary">Cancelar</button>
            </a>

            <button name="excluir" class="btn btn-danger" type="submit">Excluir</button>
        </div>
    </form>

</main>