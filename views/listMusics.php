<div class="col-md-10"><a href="<?= $base_url?>musics/form">Nova</a></div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Acões</th>
        <th scope="col">Nome</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($list as  $obj): ?>
        <tr>
            <th scope="col">
                <a class="glyphicon glyphicon-remove"  href="<?= $base_url?>musics/delete/<?= $obj['id']?>">Excluir</a>
                <a class="glyphicon glyphicon-edit"  href="<?= $base_url ?>musics/edit/<?= $obj['id']?>">Editar</a>
            </th>
            <th scope="col"><?= $obj['name']?></th>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>