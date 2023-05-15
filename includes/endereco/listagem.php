<?php 

    $mensagem = '';

    if(isset($_GET['status'])){

        switch($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso !</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada !</div>';
                break;
            default: 
                $mensagem = '';
                break;
        }
    }

    $resultados = '';

    foreach($enderecos as $endereco){
        $resultados .= '<tr>
                       <td>'.$endereco->cep.'</td>
                       <td>'.$endereco->endereco.'</td>
                       <td>'.$endereco->numero.'</td>
                       <td>'.$endereco->bairro.'</td>
                       <td>'.$endereco->cidade.'</td>
                       <td>'.$endereco->estado.'</td>
                       <td>
                            <a href="editar_endereco.php?id='.$endereco->id.'">
                                <button type="button" class="btn btn-primary">
                                    Editar
                                </button>
                            </a>
                            <a href="excluir_endereco.php?id='.$endereco->id.'">
                                <button type="button" class="btn btn-danger">
                                    Excluir
                                </button>
                            </a>
                       </td>
                       </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text-center"> Nem um endereço encontrado</td></tr>';

?>


<main>

    <?= $mensagem ?>

    <section>
        <h1 class="text-center">Endereços</h1>

        <a href="index.php">
            <button class="btn btn-secondary my-4">Voltar</button>
        </a>

        <a href="cadastrar_endereco.php?id=<?=$idCliente?>">
            <button class="btn btn-success my-4">Novo Endereço</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>CEP</th>
                    <th>Endereco</th>
                    <th>Numero</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados?>
            </tbody>
        </table>
    </section>

</main>