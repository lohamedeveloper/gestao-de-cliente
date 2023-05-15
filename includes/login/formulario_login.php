<?php 

    $alertaLogin    = strlen($alertaLogin) ? '<div class="alert alert-danger">'.$alertaLogin.'</div>' : '';
    $alertaCadastro = strlen($alertaCadastro) ? '<div class="alert alert-danger">'.$alertaCadastro.'</div>' : '';
?>

<div class="mt-4 p-5 bg-light text-dark">
    
    <div class="row">
        <div class="col">
            <form method="POST">
                <h2>Login</h2>
                <?= $alertaLogin ?>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" type="password" name="senha" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"  name="acao" value="logar">Entrar</button>
                </div>

            </form>


        </div>

        <div class="col">
            <form method="POST">
                <h2>Cadastre-se</h2>
                <?= $alertaCadastro ?>
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" type="text" name="nome" required>
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input class="form-control" type="password" name="senha" required>
                </div>

                <div class="form-group">
                    <button type="submit" name='acao' class="btn btn-primary" value="cadastrar">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>


</div>