<main>

    <h2 class="mt-3">Excluir Endereço</h2>

    <form method="POST">

        <div class="form-group">
          <p>Voçe deseja realmente excluir o endereço <strong><?= $obVaga->titulo?></strong> ?</p> 
        </div>

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>

            <button name="excluir" class="btn btn-danger" type="submit">Excluir</button>
        </div>
    </form>

</main>