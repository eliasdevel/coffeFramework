<form class="form-horizontal" method="post" action="<?= $action_form?>">
    <fieldset>
        <!-- Form Name -->
        <center><legend>Nova Artista</legend></center>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Nome:</label>
            <div class="col-md-4">
                <input id="name" name="name" type="text" placeholder="Nome"
                       value="<?= $form_data==null?'': $form_data['name'] ?>"
                       class="form-control input-md">
            </div>


        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Músicas:</label>
            <div class="col-md-4">
                <select class="js-basic-multiple" name="musics[]" multiple="multiple"  style="width: 400px">
                    <?php
                    foreach ($musics as $music):
                        ?>
                        <option <?= in_array($music['id'],$selected_musics)? 'selected':''?> value="<?= $music['id']?>"> <?= $music['name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="button"></label>
            <div class="col-md-2">
                <input id="button" name="button"  type="submit" value="Salvar"
                       class="form-control input-md">
            </div>
        </div>
    </fieldset>
</form>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
