
<form class="form-horizontal" method="post" action="<?= $action_form?>">
    <fieldset>

        <!-- Form Name -->
        <center><legend>Nova Música</legend></center>
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
            <label class="col-md-4 control-label" for="textinput">Artistas:</label>
            <div class="col-md-4">
                <select class="js-basic-multiple" name="artists[]" multiple="multiple"  style="width: 400px">
                    <?php
                    foreach ($artists as $artist):
                        ?>
                        <option <?= in_array($artist['id'],$selected_artists)? 'selected':''?> value="<?= $artist['id']?>"> <?= $artist['name']?></option>
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

</script>