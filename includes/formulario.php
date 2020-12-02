<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label for="titulo">Títullo</label>
            <input type="text" name="titulo" class="form-control" value="<?=$objVaga->titulo?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" rows="5"><?=$objVaga->descricao?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label for="status" class="form-control">
                        <input type="radio" name="status" value="s" checked>Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label for="status" class="form-control">
                        <input type="radio" name="status" value="n" <?=$objVaga->status == 'n' ? 'checked' : ''?>>Inativo
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=ACTION?></button>
        </div>
    </form>
</main>