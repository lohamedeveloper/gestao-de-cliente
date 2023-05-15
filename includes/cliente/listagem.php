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

    foreach($clientes as $cliente){
        $resultados .= '<tr>
                       <td>'.$cliente->id.'</td>
                       <td>'.$cliente->nome.'</td>
                       <td>'.$cliente->cpf.'</td>
                       <td>'.$cliente->rg.'</td>
                       <td>'.$cliente->dataNascimento.'</td>
                       <td>'.$cliente->telefone.'</td>
                       <td>
                            <a href="endereco.php?id='.$cliente->id.'">
                                <button type="button" class="btn btn-info">
                                    Endereços
                                </button>
                            </a>
                            <a href="editar_cliente.php?id='.$cliente->id.'">
                                <button type="button" class="btn btn-primary">
                                    Editar
                                </button>
                            </a>
                            <a href="excluir_cliente.php?id='.$cliente->id.'">
                                <button type="button" class="btn btn-danger">
                                    Excluir
                                </button>
                            </a>
                       </td>
                       </tr>';
    }

    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text-center"> Nem um cliente encontrado</td></tr>';

?>


<main>

    <?= $mensagem ?>

    <section>
        <a href="cadastrar_cliente.php">
            <button class="btn btn-success my-4">Novo Cliente</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Data de Nascimento</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados?>
            </tbody>
        </table>
    </section>

</main>