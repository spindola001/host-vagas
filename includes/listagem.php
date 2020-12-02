<?php

    $mensagem = '';

    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Erro ao exeutar ação!</div>';
                break;
        }
    }

    $resultados = '';

    foreach ($vagas as $vaga) {
        $resultados .= '
            <tr>
                <th>'.$vaga->vaga_id.'</th>
                <th>'.$vaga->titulo.'</th>
                <th>'.$vaga->descricao.'</th>
                <th>'.($vaga->status == 's' ? 'Ativo' : 'Inativo').'</th>
                <th>'.date('d/m/Y à\s H:i:s', strtotime($vaga->data)).'</th>
                <th>
                    <a href="editar.php?id='.$vaga->vaga_id.'">
                        <button type="button" class="btn btn-primary">Editar</button>    
                    </a>
                    <a href="excluir.php?id='.$vaga->vaga_id.'">
                        <button type="button" class="btn btn-danger">Excluir</button>    
                    </a>        
                </th>
            </tr>
        ';
    }

    $resultados = strlen($resultados) ? $resultados : '
        <tr>
            <td colspan="6" class="text-center">Nenhuma vaga encontrada</td>
        </tr>
    ';

?>

<main>
    <section>

        <?=$mensagem?>

        <a href="cadastrar.php">
            <button class="btn btn-success">Nova vaga</button>
        </a>
    </section>

    <section>

        <table class="table bg-light mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>

    </section>

</main>