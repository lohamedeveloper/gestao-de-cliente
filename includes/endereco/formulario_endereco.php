<main>

    <?= $mensagem ?>

    <section>
        <a href="index.php">
            <button class="btn btn-secondary my-4">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3">Cadastrar Endereço</h2>

    <form method="POST">

        <div class="form-group">
            <label">Endereço</label>
            <input type="text" class="form-control" name="endereco" value="<?= $obEndereco->endereco;?>" required>
        </div>
        <div class="form-group">
            <label">CEP</label>
            <input type="text" class="form-control" name="cep" value="<?= $obEndereco->cep;?>" required>
        </div>
        <div class="form-group">
            <label">Número</label>
            <input type="text" class="form-control" name="numero" value="<?= $obEndereco->numero;?>" required>
        </div>
        <div class="form-group">
            <label">Bairro</label>
            <input type="text" class="form-control" name="bairro" value="<?= $obEndereco->bairro;?>" required>
        </div>
        <div class="form-group">
            <label">Cidade</label>
            <input type="text" class="form-control" name="cidade" value="<?= $obEndereco->cidade;?>" required>
        </div>
        <div class="form-group">
            <label">Estado</label>
            <select id="estado" name="estado" class="form-control">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="EX">Estrangeiro</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success my-4">Enviar</button>
        </div>
    </form>

</main>