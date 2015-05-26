<?php

use core\library\Path as Path; ?>
<form class="form-horizontal" method="post" action="<?= Path::baseUrl()?>/elias/save/1">
    <fieldset>
        <!-- Form Name -->
        <center><legend>Login</legend></center>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">User:</label>
            <div class="col-md-4">
                <input id="name" name="name" type="text" placeholder="placeholder"
                       class="form-control input-md">
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="passwordinput">Password:</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="placeholder"
                       class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="button"></label>
            <div class="col-md-2">
                <input id="button" name="button"  type="submit"
                       class="form-control input-md">
            </div>
        </div>
    </fieldset>
</form>
