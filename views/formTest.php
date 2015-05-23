<?php

use core\library\Path as Path; ?>
<form class="form-horizontal">
    <fieldset>
        <!-- Form Name -->
        <center><legend>Login</legend></center>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">User:</label>
            <div class="col-md-4">
                <input id="textinput" name="textinput" type="text" placeholder="placeholder"
                       class="form-control input-md">
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="passwordinput">Password:</label>
            <div class="col-md-4">
                <input id="passwordinput" name="passwordinput" type="password" placeholder="placeholder"
                       class="form-control input-md">
            </div>
        </div>
    </fieldset>
</form>
