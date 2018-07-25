
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search" style="float:right;margin-left:100px;">
                <input type="text" class="form-control" placeholder="Search for snippets" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <?php foreach($cols as $key => $val):?>
                                  <div class="form-group">
                                    <label for="contain"><?= $val ?></label>
                                    <input class="form-control" name = "<?= $key ?>"  value = "<?= !empty($_GET[$key])?$_GET[$key]:'' ?>"type="text" />
                                  </div>
                                  <?php endforeach;?>
                                  
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

